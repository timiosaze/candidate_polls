import './bootstrap';

import Alpine from 'alpinejs';
import candidate from './alpine/candidate';
import states from './alpine/states';
window.Alpine = Alpine;
Alpine.data('candidate', candidate)
Alpine.data('states', states)
Alpine.start();
