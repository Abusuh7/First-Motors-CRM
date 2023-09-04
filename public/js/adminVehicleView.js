// Get all the thumbnail images
const thumbnailImages = document.querySelectorAll('.thumbnail img');
const mainImage = document.getElementById('mainImage');
const previousOwnerBtn = document.getElementById('previousOwnerInfoBtn');
const previousOwnerInfo = document.getElementById('previousOwnerInfo');

// Add click event listener to each thumbnail
thumbnailImages.forEach((thumbnail) => {
    thumbnail.addEventListener('click', () => {
        // Store the current main image's source
        const currentMainImageSrc = mainImage.src;

        // Set the source of the main image to the clicked thumbnail's source
        mainImage.src = thumbnail.src;

        // Set the clicked thumbnail's source to the main image's source
        thumbnail.src = currentMainImageSrc;



    });
});


// Add click event listener to previous owner info button
previousOwnerBtn.addEventListener('click', () => {
    // Toggle the previous owner info
    previousOwnerInfo.classList.toggle('hidden');
});




// const mainImage = document.getElementById("mainImage");
// const thumbnailContainer = document.getElementById("thumbnailContainer");

// thumbnailContainer.addEventListener("click", (e) => {
//     if (e.target.classList.contains("thumbnail")) {
//         // Get the clicked thumbnail's image source
//         const clickedImageSrc = e.target.querySelector("img").src;

//         // Store the current main image's source
//         const currentMainImageSrc = mainImage.src;

//         // Set the clicked thumbnail's image as the main image
//         mainImage.src = clickedImageSrc;

//         // Set the current main image source to the clicked thumbnail
//         e.target.querySelector("img").src = currentMainImageSrc;
//     }
// });
