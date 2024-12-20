import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class FileService extends BaseService {
    url = 'files';

    constructor(injector: Injector) {
        super(injector);
    }
}
