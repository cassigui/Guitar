import { Serializable } from 'src/app/base/serializable';
import * as moment from 'moment';
import { Image } from '../images/image';

export class Banner extends Serializable {

    id: number = null;
    title: string = null;
    mini_title:string = null;
    description: string = null;
    button_cta: string = null;
    link: string = null;

    images: Image[] = [];
    image: Image = new Image;

    created_at: moment.Moment = null;
    updated_at: moment.Moment = null;
    deleted_at: moment.Moment = null;

    constructor(data: Object = {}) {
        super();
        super.serialize(data);
    }

    get relations() {
        return {
            images: Image,
        };
    }

    get dates() {
        return ['created_at', 'updated_at', 'deleted_at'];
    }

    get http_data() {
        return {
            id: this.id,
            title: this.title,
            mini_title: this.mini_title,
            description: this.description,
            button_cta: this.button_cta,
            link: this.link,
            image: this.image, 
            images: this.images,
        }
    }
}
