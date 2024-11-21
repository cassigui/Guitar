import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class BannerService extends BaseService {

    url = 'banners';

    constructor(injector: Injector) {
        super(injector);
    }

}