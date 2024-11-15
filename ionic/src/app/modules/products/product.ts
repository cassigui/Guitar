import { Serializable } from 'src/app/base/serializable';
import * as moment from 'moment';
import { Image } from '../images/image';
import { Brand } from '../brands/brand';
import { Category } from '../categories/category';

export class Product extends Serializable {
    id: number = null;
    name: string = null;
    slug: string = null;
    price: string = null;
    promo_price: string = null;
    description: string = null;
    brand_id: number = null;

    brand: Brand = new Brand;
    categories: Category[] = [];
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
            brand: Brand,
            categories: Category,
            images: Image,
        };
    }

    get dates() {
        return ['created_at', 'updated_at', 'deleted_at'];
    }

    get http_data() {
        return {
            id: this.id,
            name: this.name,
            slug: this.slug,
            price: this.price,
            promo_price: this.promo_price,
            description: this.description,
            brand_id: this.brand_id,
            image: this.image,
            images: this.images,
            categories: this.categories
        }
    }
}
