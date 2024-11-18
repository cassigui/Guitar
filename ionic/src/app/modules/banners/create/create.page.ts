import { Component, OnInit, ViewChild, Input, ElementRef } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IonContent, ModalController } from '@ionic/angular';
import { ImageCroppedEvent } from 'ngx-image-cropper';

import { Image } from '../../images/image';
import { Banner } from '../banner';

import { ProductService } from '../banner.service';
import { HelperService } from 'src/app/base/helper.service';
import { ImageService } from '../../images/image.service';
import { CategoryService } from '../../categories/category.service';

@Component({
    selector: 'app-create',
    templateUrl: './create.page.html',
    styleUrls: ['./create.page.scss'],
})
export class CreatePage implements OnInit {
    @ViewChild(IonContent, { static: false }) content: IonContent;

    id: number;
    banner: Banner = new Banner();
    loading: boolean = false;
    editing: boolean = false;

    imageChangedEvent: any = '';
    croppedImage: any = '';

    url_s3: string = this.ProductService.url_s3;

    constructor(
        private categoryService: CategoryService,
        private helperService: HelperService,
        private imageService: ImageService,
        private modalController: ModalController,
        private ProductService: ProductService,
        private route: ActivatedRoute,
        private router: Router
    ) {
        this.banner = new Banner();
    }

    ngOnInit() { }

    ionViewWillEnter() {
        this.banner = new Banner();
        this.id = this.id = this.route.snapshot.paramMap.get('id')
            ? parseInt(this.route.snapshot.paramMap.get('id'))
            : null;
        if (this.id) {
            this.editing = true;
            this.get();
        }
    }

    get() {
        this.ProductService.find(['images'], { id: this.id }).then(
            async (data: any) => { 
                this.banner = new Banner(data.banner);
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    save() {

        if (Array.isArray(this.banner.images) && this.banner.images.length === 0) {
            this.helperService.toast('danger', 'Imagem é obrigatório.');
            return;
        }
        
        this.helperService.loading('Salvando');

        if (this.banner.id > 0) {
            this.update();
        } else {
            this.store();
        }
    }

    store() {
        this.ProductService.store(this.banner).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Salvo com sucesso!');
                this.router.navigate(['banners']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    update() {
        this.ProductService.update(this.banner).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Alterado com sucesso!');
                this.router.navigate(['banners']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    //Image
    pushImage() {
        this.banner.images.push(new Image({ base64: this.croppedImage }));
        this.imageChangedEvent = null;
        this.croppedImage = null;
        this.banner.image = new Image;
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
        let index = this.banner.images.indexOf(image);

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
                    this.banner.images.splice(index, 1);
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
                this.banner.images.splice(index, 1);
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    debug() {
        console.log(this.banner);
    }
}
