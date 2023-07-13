//FILTERING
const filterDropdown = document.getElementById('filter');
const allproduct = document.getElementById('showallproduct');
const instockproduct = document.getElementById('showinstock');
const lowstockproduct = document.getElementById('showlowstock');
const outofstockproduct = document.getElementById('showoutofstock');


filterDropdown.addEventListener('change', function () {
    const selectedValue = filterDropdown.value;

    // Perform actions based on the selected value
    if (selectedValue === 'instock') {
        // Code to handle when "InStock" is selected
        allproduct.classList.add('hidden')
        lowstockproduct.classList.add('hidden')
        outofstockproduct.classList.add('hidden')
        instockproduct.classList.remove('hidden')
        console.log('InStock selected');
    } else if (selectedValue === 'lowstock') {
        // Code to handle when "LowStock" is selected
        allproduct.classList.add('hidden')
        instockproduct.classList.add('hidden')
        outofstockproduct.classList.add('hidden')
        lowstockproduct.classList.remove('hidden')
        console.log('LowStock selected');
    } else if (selectedValue === 'outofstock') {
        // Code to handle when "OutOfStock" is selected
        allproduct.classList.add('hidden')
        instockproduct.classList.add('hidden')
        lowstockproduct.classList.add('hidden')
        outofstockproduct.classList.remove('hidden')
        console.log('OutOfStock selected');
    } else {
        // Code to handle when "All" or any other value is selected
        allproduct.classList.remove('hidden')
        instockproduct.classList.add('hidden')
        lowstockproduct.classList.add('hidden')
        outofstockproduct.classList.add('hidden')
        console.log('All selected');
    }

    console.log('Selected:', selectedValue);
});




//Add new Product form display
const showProductFormButton = document.getElementById('showProductFormButton');
const formProductContainer = document.getElementById('productFromContainer');

showProductFormButton.addEventListener('click', () => {
    formProductContainer.classList.remove('hidden');
});

const closeProductFormButton = document.getElementById('closeProductForm');

closeProductFormButton.addEventListener('click', () => {
    formProductContainer.classList.add('hidden');
}
);



//VIDEO
$(document).ready(function() {
    var video = document.getElementById('adVideo');
    var videoContainer = document.getElementById('adVideoContainer');

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                video.play();
            } else {
                video.pause();
                video.currentTime = 0; // Reset video to beginning when not visible
            }
        });
    }, {
        threshold: 0.5
    });

    observer.observe(videoContainer);
});
