const showDisplayBtn = document.getElementById('viewDescriptionBtn');
const showDisplayContent = document.getElementById('descriptionShow');

//toggle hidden class
showDisplayBtn.addEventListener('click', () => {
    showDisplayContent.classList.toggle('hidden');
}
);
