import { Component, OnInit, ViewChild } from '@angular/core';
import { IonContent, IonInfiniteScroll, IonItemSliding } from '@ionic/angular';

import { Lead } from '../lead';

import { LeadService } from '../lead.service';
import { HelperService } from 'src/app/base/helper.service';

import { environment } from './../../../../environments/environment';

@Component({
    selector: 'app-index',
    templateUrl: './index.page.html',
    styleUrls: ['./index.page.scss'],
})
export class IndexPage implements OnInit {

    @ViewChild('search', { static: false }) search: any;
    @ViewChild(IonContent, { static: false }) content: IonContent;
    @ViewChild(IonInfiniteScroll, { static: false }) infiniteScroll: IonInfiniteScroll;

    public api_url: string = environment.api_url;

    public leads: Array<Lead> = [];
    public loading: boolean = false;

    public showFilter: boolean;
    public filters: any = {
        email: null
    };

    public total_of_data = 0;
    public _paginate: any = {
        take: 20,
        page: 1
    };

    public trs: any = new Array(5);
    public tds: any = new Array(1);

    page_category_id: number;

    constructor(
        private leadService: LeadService,
        private helperService: HelperService,
    ) { }

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

        filters['orderBy'] = '!id';

        return filters;
    }

    async paginate(ionRefresher: any = null, ionInfiniteScroll: any = null) {
        if (ionRefresher !== null || (ionRefresher == null && ionInfiniteScroll == null)) {
            this.leads = [];
            this._paginate.page = 1;
        }
        this.loading = true;
        this.leadService.get([], this.getFilters(), this._paginate)
            .then(
                async (response: any) => {
                    this.total_of_data = response.leads.total;
                    this._paginate.page = response.leads.current_page + 1;
                    for (let lead of response.leads.data) {
                        this.leads.push(new Lead(lead))
                    }
                    this.loading = false;
                    if (ionRefresher) {
                        ionRefresher.target.complete();
                    }
                    if (ionInfiniteScroll) {
                        ionInfiniteScroll.target.complete();
                    }
                    if (this.total_of_data == this.leads.length) {
                        // ionInfiniteScroll.target.disabled = true;
                    }
                },
                (error: any) => {
                    this.helperService.responseErrors(error)
                }
            )
    }

    async remove(model: Lead, eventPopover: any) {
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
                this.destroy(model);
            }
        });

        popover.present();
    }

    destroy(model: Lead) {
        this.leadService.destroy(model.id)
            .then((response) => {
                if (!response.error) {
                    var index = this.leads.findIndex(ac => ac.id == model.id);
                    if (index > -1) {
                        this.leads.splice(index, 1);
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

    export() {
        window.open(this.api_url + '/export_leads', '_blank');
    }
}
