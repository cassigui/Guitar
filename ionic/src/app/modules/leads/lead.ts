import { Serializable } from 'src/app/base/serializable';
import * as moment from 'moment';
import { LandingPage } from '../page-creators/landing-pages/landing-page';

export class Lead extends Serializable {

    id: number = null;
    name: string = null;
    email: string = null;
    message: string = null;
    phone: string = null;
    msg_subject: string = null;
    contact_name_enterprise: string = null;
    
    created_at: moment.Moment = null;
    updated_at: moment.Moment = null;
    deleted_at: moment.Moment = null;

    landing_page: LandingPage = new LandingPage;

    constructor(data: Object = {}) {
        super();
        super.serialize(data);
    }

    get relations() {
        return {
            landing_page: LandingPage
        }
    }

    get dates() {
        return ['created_at', 'updated_at', 'deleted_at'];
    }

    get http_data() {
        return {
            name: this.name,
            email: this.email,
            message: this.message,
            phone: this.phone,
            msg_subject: this.msg_subject,
            contact_name_enterprise: this.contact_name_enterprise,
        }
    }

}
