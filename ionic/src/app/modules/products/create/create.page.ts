import { Component, OnInit, ViewChild, Input, ElementRef } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IonContent, ModalController } from '@ionic/angular';
import { ImageCroppedEvent } from 'ngx-image-cropper';

import { Brand } from '../../brands/brand';
import { BrandService } from '../../brands/brand.service';
import { Image } from '../../images/image';
import { Product } from '../product';

import { ProductService } from '../product.service';
import { HelperService } from 'src/app/base/helper.service';
import { ImageService } from '../../images/image.service';
import { SelectComponent } from 'src/app/components/select/select.component';
import { SelectMultipleComponent } from 'src/app/components/select-multiple/select-multiple.component';
import { Category } from '../../categories/category';
import { CategoryService } from '../../categories/category.service';

@Component({
    selector: 'app-create',
    templateUrl: './create.page.html',
    styleUrls: ['./create.page.scss'],
})
export class CreatePage implements OnInit {
    @ViewChild(IonContent, { static: false }) content: IonContent;

    id: number;
    product: Product = new Product();
    loading: boolean = false;
    editing: boolean = false;

    brands: Brand[] = [];
    categories: Category[] = [];

    imageChangedEvent: any = '';
    croppedImage: any = '';

    url_s3: string = this.ProductService.url_s3;

    constructor(
        private brandService: BrandService,
        private categoryService: CategoryService,
        private helperService: HelperService,
        private imageService: ImageService,
        private modalController: ModalController,
        private ProductService: ProductService,
        private route: ActivatedRoute,
        private router: Router
    ) {
        this.product = new Product();
    }

    ngOnInit() { }

    ionViewWillEnter() {
        this.product = new Product();
        this.id = this.id = this.route.snapshot.paramMap.get('id')
            ? parseInt(this.route.snapshot.paramMap.get('id'))
            : null;
        if (this.id) {
            this.editing = true;
            this.get();
        }
        this.getBrands();
        this.getCategories();
    }

    get() {
        this.ProductService.find(['images', 'brand', "categories"], { id: this.id }).then(
            async (data: any) => {
                this.product = new Product(data.product);
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    save() {

        if (Array.isArray(this.product.images) && this.product.images.length === 0) {
            this.helperService.toast('danger', 'Imagem é obrigatório.');
            return;
        }

        if (parseFloat(this.product.promo_price) >= parseFloat(this.product.price)) {
            this.helperService.toast('secondary', "O preço promocional deve ser menor que o preço do produto");
            return;
        }

        this.helperService.loading('Salvando');

        if (this.product.id > 0) {
            this.update();
        } else {
            this.store();
        }
    }

    store() {
        this.ProductService.store(this.product).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Salvo com sucesso!');
                this.router.navigate(['products']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    update() {
        this.ProductService.update(this.product).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Alterado com sucesso!');
                this.router.navigate(['products']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    getBrands() {
        this.brandService.get([]).then(
            async (data: any) => {
                this.brands = []
                this.brands = data.brands.map(brand => new Brand(brand));
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    getCategories() {
        this.categoryService.get([]).then(
            async (data: any) => {
                console.log(data)
                this.categories = []
                this.categories = data.categories.map(category => new Category(category));
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    //Select Brand
    async selectBrand() {
        const modal = await this.modalController.create({
            component: SelectComponent,
            componentProps: {
                title: 'Marcas',
                options: this.brands
            }
        });

        await modal.present();

        const { data } = await modal.onWillDismiss();

        if (data) {
            this.product.brand = new Brand(data);
            this.product.brand_id = this.product.brand.id;
        }
    }

    //Select Categories
    async selectCategories() {
        const modal = await this.modalController.create({
            component: SelectMultipleComponent,
            componentProps: {
                title: 'Categorias',
                options: this.categories,
                selecteds: this.product.categories
            }
        });

        await modal.present();

        const { data } = await modal.onWillDismiss();

        if (data) {
            this.product.categories = this.categories.filter(category => data.includes(category.id));
        }
    }

    //Image
    pushImage() {
        this.product.images.push(new Image({ base64: this.croppedImage }));
        this.imageChangedEvent = null;
        this.croppedImage = null;
        this.product.image = new Image;
    }

    fileChangeEvent(event: any): void {
        this.imageChangedEvent = event;
    }

    imageCropped(event: ImageCroppedEvent) {
        this.croppedImage = event.base64;
    }

    imageLoaded() { }

    cropperReady() { }

    loadImageFailed() {
        this.helperService.toast('danger', 'Formato de imagem não suportada.');
    }

    get_thumb(image: any, prefix: string) {
        return image.path.replace(
            '/' + image.imageable_id + '_',
            '/' + prefix + image.imageable_id + '_'
        );
    }

    async removeImage(image: Image, eventPopover: any) {
        let index = this.product.images.indexOf(image);

        let popover = await this.helperService.listPopover(
            eventPopover,
            'Tem certeza?',
            [
                {
                    text: 'voltar',
                    color: 'grey',
                    value: false,
                },
                {
                    text: 'remover',
                    color: 'danger',
                    value: true,
                },
            ]
        );

        popover.onDidDismiss().then(async (popoverData) => {
            if (popoverData.data === true) {
                if (image.id > 0) {
                    this.destroyImage(image, index);
                } else {
                    this.helperService.toast('success', 'Removido com sucesso');
                    this.product.images.splice(index, 1);
                }
            }
        });

        popover.present();
    }

    async destroyImage(image: Image, index: number) {
        this.imageService.destroy(image.id).then(
            (data: any) => {
                if (data.error) {
                    this.helperService.toast('error', data.message);
                }
                this.helperService.toast('success', 'Removido com sucesso');
                this.product.images.splice(index, 1);
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    debug() {
        console.log(this.product);
    }
}
