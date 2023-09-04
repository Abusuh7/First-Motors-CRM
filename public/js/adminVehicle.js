const showVehicleForm = document.getElementById("vehicleFromContainer");
const showVehicleFormBtn = document.getElementById("showVehicleFormButton");
const closeVehicleFormBtn = document.getElementById("closeVehicleForm");

// const vehicleOwnershipSelect = document.getElementById("vehicle_ownership");
// const previousOwnerDetailsSection = document.getElementById(
//     "previousOwnerDetailsSection"
// );



showVehicleFormBtn.addEventListener("click", () => {
    showVehicleForm.classList.toggle("hidden");
});

closeVehicleFormBtn.addEventListener("click", () => {
    showVehicleForm.classList.add("hidden");
});






// vehicleOwnershipSelect.addEventListener("change", function () {
//     const selectedValue = vehicleOwnershipSelect.value;

//     if (selectedValue === "new") {
//         previousOwnerDetailsSection.classList.add("none");
//     } else {
//         previousOwnerDetailsSection.classList.remove("block");
//     }
// });

document.addEventListener("DOMContentLoaded", function () {
    // Get references to the vehicle ownership select element and the previous owner details section
    const vehicleOwnershipSelect = document.getElementById("vehicle_ownership");
    const previousOwnerDetailsSection = document.getElementById("previousOwnerDetailsSection");

    // Function to show or hide the previous owner details section based on the selected ownership
    function togglePreviousOwnerDetails() {
        const selectedOwnership = vehicleOwnershipSelect.value;
        if (selectedOwnership === "new") {
            // Hide the previous owner details section
            previousOwnerDetailsSection.style.display = "none";
        } else {
            // Show the previous owner details section
            previousOwnerDetailsSection.style.display = "block";
        }
    }

    // Initial call to togglePreviousOwnerDetails to set the initial state
    togglePreviousOwnerDetails();

    // Add an event listener to the vehicle ownership select element
    vehicleOwnershipSelect.addEventListener("change", togglePreviousOwnerDetails);
});
