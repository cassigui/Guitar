import { Serializable } from 'src/app/base/serializable';
import * as moment from 'moment';
import { Image } from '../images/image';

export class Banner extends Serializable {
    id: number = 0;
    tagline: string = "";
    title: string = "";
    slug: string = "";
    description: string = "";
    button_cta: string = "";
    link: string = "";

    image: Image = new Image();
    
    created_at: moment.Moment = null;
    updated_at: moment.Moment = null;
    deleted_at: moment.Moment = null;

    constructor(data: Object = {}) {
        super();
        super.serialize(data);
    }

    get relations() {
        return {
            image: Image,
        };
    }

    get dates() {
        return ['created_at', 'updated_at', 'deleted_at'];
    }

    get http_data() {
        return {
            id:this.id,
            tagline: this.tagline,
            title: this.title,
            slug: this.slug,
            description: this.description,
            button_cta: this.button_cta,
            link: this.link,
            image:this.image,
        };
    }
}
