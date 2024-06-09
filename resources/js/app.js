import './bootstrap';

import Alpine from 'alpinejs';

import jQuery from 'jquery';
import jQValidation from 'jquery-validation';
import 'jquery-validation/dist/localization/messages_pt_BR';

window.Alpine = Alpine;
window.$ = jQuery;
window.validate = jQValidation;

Alpine.start();
