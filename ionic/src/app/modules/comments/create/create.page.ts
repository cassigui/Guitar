import { Component, OnInit, ViewChild, Input, ElementRef } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { IonContent } from '@ionic/angular';
import { ImageCroppedEvent } from 'ngx-image-cropper';

import { Image } from '../../images/image';
import { Comment } from '../comment';

import { CommentService } from '../comment.service';
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
    comment: Comment = new Comment();
    loading: boolean = false;
    editing: boolean = false;

    imageChangedEvent: any = '';
    croppedImage: any = '';

    url_s3: string = this.commentService.url_s3;

    constructor(
        private helperService: HelperService,
        private imageService: ImageService,
        private commentService: CommentService,
        private route: ActivatedRoute,
        private router: Router
    ) {
        this.comment = new Comment();
    }

    ngOnInit() { }

    ionViewWillEnter() {
        this.comment = new Comment();
        this.id = this.id = this.route.snapshot.paramMap.get('id')
            ? parseInt(this.route.snapshot.paramMap.get('id'))
            : null;
        if (this.id) {
            this.editing = true;
            this.get();
        }
    }

    get() {
        this.commentService.find(['image'], { id: this.id }).then(
            async (data: any) => {
                this.comment = new Comment(data.comment);
                if (this.comment.image == null) {
                    this.comment.image = new Image();
                }
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    save() {
        if (!this.comment.image.path && !this.comment.image.base64) {
            this.helperService.toast('danger', 'Imagem é obrigatório.');
            return;
        }

        this.helperService.loading('Salvando');

        if (this.comment.id > 0) {
            this.update();
        } else {
            this.store();
        }
    }

    store() {
        this.commentService.store(this.comment).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Salvo com sucesso!');
                this.router.navigate(['comments']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    update() {
        this.commentService.update(this.comment).then(
            (data: any) => {
                this.helperService.loading_dismiss();
                if (data.error) {
                    this.helperService.toast('danger', data.error_message);
                    return false;
                }
                this.helperService.toast('success', 'Alterado com sucesso!');
                this.router.navigate(['comments']);
            },
            (error: any) => {
                this.helperService.loading_dismiss();
                this.helperService.responseErrors(error);
            }
        );
    }

    pushImage() {
        this.comment.image = new Image({ base64: this.croppedImage });
        this.imageChangedEvent = null;
        this.croppedImage = null;
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

    async removeImage(image: Image, index: number, eventPopover: any) {
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
                    this.comment.image = new Image();
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
                this.comment.image = new Image();
            },
            (error: any) => {
                this.helperService.responseErrors(error);
            }
        );
    }

    debug() {
        console.log(this.comment);
    }

}

