import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class BrandService extends BaseService {

    url = 'brands';

    constructor(injector: Injector) {
        super(injector);
    }

}