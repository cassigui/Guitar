import { Injectable, Injector } from '@angular/core';
import { BaseService } from 'src/app/base/base.service';

@Injectable({
    providedIn: 'root'
})
export class CommentService extends BaseService {

    url = 'comments';

    constructor(injector: Injector) {
        super(injector);
    }

}