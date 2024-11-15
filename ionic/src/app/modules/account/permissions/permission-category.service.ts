import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class PermissionCategoryService extends BaseService {

    public url: string = 'user-permission-categories';
    public prefix: string = 'wf-api';

    constructor(injector: Injector) {
        super(injector);
    }
}
