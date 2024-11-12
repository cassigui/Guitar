import { Component, OnInit, ViewChild } from '@angular/core';
import { IonContent, IonInfiniteScroll, IonItemSliding } from '@ionic/angular';

import { Brand } from '../brand';

import { BrandService } from '../brand.service';
import { HelperService } from 'src/app/base/helper.service';

@Component({
    selector: 'app-index',
    templateUrl: './index.page.html',
    styleUrls: ['./index.page.scss'],
})
export class IndexPage implements OnInit {

    @ViewChild('search', { static: false }) search: any;
    @ViewChild(IonContent, {static: false}) content: IonContent;
    @ViewChild(IonInfiniteScroll, { static: false }) infiniteScroll: IonInfiniteScroll;

    brands: Array<Brand> = [];
    loading: boolean = false;
    url_s3: string;

    showFilter: boolean;
    filters: any = {
        name: null
    };

    total_of_data = 0;
    _paginate: any = {
        take: 20,
        page: 1
    };

    trs: any = new Array(5);
    tds: any = new Array(1);

    constructor(
        private brandService: BrandService,
        private helperService: HelperService,
    ) {
        this.url_s3 = this.brandService.url_s3;
    }

    ngOnInit() {
    }

    ionViewWillEnter() {
        this.paginate(null, null);
    }

    getFilters() {
        var filters = {};

        Object.keys(this.filters).forEach(key => {
            if (this.filters[key]) {
                filters[key] = "%" + this.filters[key] + "%";
            }
        }, this);

        return filters;
    }

    async paginate(ionRefresher: any = null, ionInfiniteScroll: any = null) {
        if (ionRefresher !== null || (ionRefresher==null && ionInfiniteScroll==null)) {
            this.brands = [];
            this._paginate.page = 1;
        }
        this.loading = true;
        this.brandService.get([], this.getFilters(), this._paginate)
            .then(
                async (response: any) => {
                    this.total_of_data = response.brands.total;
                    this._paginate.page = response.brands.current_page + 1;
                    for (let brand of response.brands.data) {
                        this.brands.push(new Brand(brand))
                    }

                    this.loading = false;
                    if (ionRefresher) {
                        ionRefresher.target.complete();
                    }
                    if (ionInfiniteScroll) {
                        ionInfiniteScroll.target.complete();
                    }
                    if (this.total_of_data == this.brands.length) {
                        // ionInfiniteScroll.target.disabled = true;
                    }
                },
                (error: any) => {
                    this.helperService.responseErrors(error)
                }
            )
    }

    async remove(user: Brand, eventPopover: any) {
        let popover = await this.helperService.listPopover(eventPopover, 'Tem certeza?', [
            {
                text: 'voltar',
                color: 'grey',
                value: false
            },
            {
                text: 'remover',
                color: 'danger',
                value: true
            },
        ]);

        popover.onDidDismiss().then((popoverData) => {
            if (popoverData.data === true) {
                this.helperService.loading('Removendo');
                this.destroy(user);
            }
        });

        popover.present();
    }

    destroy(model: Brand) {
        this.brandService.destroy(model.id)
            .then((response) => {
                if (!response.error) {
                    var index = this.brands.findIndex(ac => ac.id == model.id);
                    if (index > -1) {
                        this.brands.splice(index, 1);
                    }
                }
                this.helperService.toast(response.error ? 'warning' : 'success', response.message);
            }, (error) => {
                this.helperService.responseErrors(error);
            })
            .then(() => this.helperService.loading_dismiss())
    }

    toggleSearch() {
        this.showFilter = !this.showFilter;
        if (this.showFilter) {
            setTimeout(() => {
                this.search.setFocus();
            }, 100)
        }
    }

    // get_thumb(image: any, prefix: string) {
    //     return image.path.replace('/' + image.imageable_id + '_', '/' + prefix + image.imageable_id + '_');
    // }
}
