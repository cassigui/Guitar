import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class ImageService extends BaseService {

    url = 'images';

    constructor(injector: Injector) {
        super(injector);
    }

}