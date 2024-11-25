import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class LeadService extends BaseService {

    url = 'leads';

    constructor(injector: Injector) {
        super(injector);
    }

}