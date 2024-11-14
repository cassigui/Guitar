import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class CategoryService extends BaseService {

    url = 'categories';

    constructor(injector: Injector) {
        super(injector);
    }

}