const showVehicleForm = document.getElementById('vehicleFromContainer');
const showVehicleFormBtn = document.getElementById('showVehicleFormButton');
const closeVehicleFormBtn = document.getElementById('closeVehicleForm');



showVehicleFormBtn.addEventListener('click', () => {
    showVehicleForm.classList.toggle('hidden');
}
);

closeVehicleFormBtn.addEventListener('click', () => {
    showVehicleForm.classList.add('hidden');
}
);

