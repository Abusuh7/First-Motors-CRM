import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


const showFormButton = document.getElementById('showFormButton');
const formContainer = document.getElementById('formContainer');
const closeUserForm = document.getElementById('closeUserForm');

showFormButton.addEventListener('click', () => {
    formContainer.classList.remove('hidden');
});

closeUserForm.addEventListener('click', () => {
    formContainer.classList.add('hidden');
});



// const showEditFormButton = document.getElementById('showEditFormButton');
// const formEditContainer = document.getElementById('formEditContainer');

// showEditFormButton.addEventListener('click', () => {
//     formEditContainer.classList.remove('hidden');
// });



