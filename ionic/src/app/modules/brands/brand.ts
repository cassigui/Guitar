import { Serializable } from 'src/app/base/serializable';
import * as moment from 'moment';
import { Image } from '../images/image';

export class Brand extends Serializable {
    id: number = 0;
    name: string = "";
    slug: string = "";

    image: Image = new Image();
    // images : Image[] = []

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
            name: this.name,
            slug: this.slug,
            image: this.image,
        };
    }
}
