import { Component, OnInit, ViewChild, Input, ElementRef } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IonContent } from '@ionic/angular';

import { Category } from '../category';

import { CategoryService } from '../category.service';
import { HelperService } from 'src/app/base/helper.service';
import { ImageService } from '../../images/image.service';

@Component({
    selector: 'app-create',
    templateUrl: './create.page.html',
    styleUrls: ['./create.page.scss'],
})
export class CreatePage implements OnInit {
    @ViewChild(IonContent, { static: false }) content: IonContent;

    id: number;
    category: Category = new Category();
    loading: boolean = false;
    editing: boolean = false;

    imageChangedEvent: any = '';
    croppedImage: any = '';

    url_s3: string = this.CategoryService.url_s3;

    constructor(
        private helperService: HelperService,
        private imageService: ImageService,
        private CategoryService: CategoryService,
        private route: ActivatedRoute,
        private router: Router
    ) {
        this.category = new Category();
    }

    ngOnInit() {}

    ionViewWillEnter() {
        this.category = new Category();
        this.id = this.id = this.route.snapshot.paramMap.get('id')
            ? parseInt(this.route.snapshot.paramMap.get('id'))
            : null;
        if (this.id) {
            this.editing = true;
            this.get();
        }
    }

    get() {
        this.CategoryService.find([], { id: this.id }).then(
            async (data: any) => {
                this.category = new Category(data.category);
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    save() {

        this.helperService.loading('Salvando');

        if (this.category.id > 0) {
            this.update();
        } else {
            this.store();
        }
    }

    store() {
        this.CategoryService.store(this.category).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Salvo com sucesso!');
                this.router.navigate(['categories']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    update() {
        this.CategoryService.update(this.category).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Alterado com sucesso!');
                this.router.navigate(['categories']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

}
