<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>



    {{-- Form for new vehicle  --}}
    <div id="vehicleFromContainer" class="max-w-2xl mx-auto py-8 hidden">

        <form method="POST" action="" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div id="closeVehicleForm" class=" w-full flex justify-end">
                <span id="closeIcon" class="close-icon">&#10005;</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_type">
                    Vehicle Type
                </label>
                <input name="vehicle_type" id="vehicle_type" type="text" placeholder="Vehicle Type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_make">
                    Vehicle Make
                </label>
                {{-- <input name="vehicle_make" id="vehicle_make" type="text" placeholder="Vehicle Make"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                    <select name="vehicle_make" id="vehicle_make" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="toyota">Toyota</option>
                        <option value="nissan">Nissan</option>
                        <option value="honda">Honda</option>
                        <option value="mitsubishi">Mitsubishi</option>
                        <option value="suzuki">Suzuki</option>
                        <option value="mazda">Mazda</option>
                        <option value="subaru">Subaru</option>
                        <option value="volkswagen">Volkswagen</option>
                        <option value="mercedes-benz">Mercedes-Benz</option>
                        <option value="bmw">BMW</option>
                        <option value="audi">Audi</option>
                        <option value="lexus">Lexus</option>
                        <option value="bugatti">Bugatti</option>
                        <option value="ferrari">Ferrari</option>
                        <option value="lamborghini">Lamborghini</option>
                        <option value="maserati">Maserati</option>
                        <option value="bentley">Bentley</option>
                        <option value="rolls-royce">Rolls-Royce</option>
                        <option value="aston-martin">Aston Martin</option>
                        <option value="mclaren">McLaren</option>
                        <option value="land-rover">Land Rover</option>
                        <option value="jaguar">Jaguar</option>
                        <option value="porsche">Porsche</option>
                        <option value="jeep">Jeep</option>
                        <option value="ford">Ford</option>
                        <option value="chevrolet">Chevrolet</option>
                        <option value="dodge">Dodge</option>
                        <option value="tesla">Tesla</option>
                    </select>
                @error('vehicle_make')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_model">
                    Vehicle Model
                </label>
                <input name="vehicle_model" id="vehicle_model" type="text" placeholder="Vehicle Model"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_model')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_year_manufactured">
                    Vehicle Year Manufactured
                </label>
                <input name="vehicle_year_manufactured" id="vehicle_year_manufactured" type="number"
                    placeholder="Vehicle Year Manufactured"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_year_manufactured')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_year_registered">
                    Vehicle Year Registered
                </label>
                <input name="vehicle_year_registered" id="vehicle_year_registered" type="number"
                    placeholder="Vehicle Year Registered"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_year_registered')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_ownership">
                    Vehicle Ownership
                </label>
                <input name="vehicle_ownership" id="vehicle_ownership" type="number" placeholder="Vehicle Ownership" max="4" maxlength="1"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_ownership')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_color">
                    Vehicle Color
                </label>
                <input name="vehicle_color" id="vehicle_color" type="text" placeholder="Vehicle Color"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_color')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_mileage">
                    Vehicle Mileage
                </label>
                <input name="vehicle_mileage" id="vehicle_mileage" type="number" placeholder="Vehicle Mileage"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_mileage')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_transmission">
                    Vehicle Transmission
                </label>
                {{-- <input name="vehicle_transmission" id="vehicle_transmission" type="text" placeholder="vehicle_transmission"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="vehicle_transmission" id="vehicle_transmission"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                </select>
                @error('vehicle_transmission')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_fuel_type">
                    Vehicle Fuel Type
                </label>
                {{-- <input name="vehicle_fuel_type" id="vehicle_fuel_type" type="text" placeholder="vehicle_fuel_type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="vehicle_fuel_type" id="vehicle_fuel_type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                </select>
                @error('vehicle_fuel_type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_condition">
                    Vehicle Condition
                </label>
                {{-- <input name="vehicle_condition" id="vehicle_condition" type="text" placeholder="vehicle_condition"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="vehicle_condition" id="vehicle_condition"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                </select>
                @error('vehicle_condition')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_license_plate">
                    Vehicle License Plate
                </label>
                <input name="vehicle_license_plate" id="vehicle_license_plate" type="text"
                    placeholder="WP-CAD-1234"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_license_plate')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_thumbnail">
                    Vehicle Thumbnail Image
                </label>
                <input name="vehicle_thumbnail" id="vehicle_thumbnail" type="file"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_thumbnail')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_images">
                    Vehicle More Image
                </label>
                <input name="vehicle_images" id="vehicle_images" type="file" multiple
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('vehicle_images')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_description">
                    Vehicle Description
                </label>
                <textarea name="vehicle_description" id="vehicle_description" placeholder="Vehicle Description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                @error('vehicle_description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_cost_price">
                    Vehicle Cost Price
                </label>
                <input name="vehicle_cost_price" id="vehicle_cost_price" type="number" placeholder="Vehicle Cost Price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_cost_price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_selling_price">
                    Vehicle Selling Price
                </label>
                <input name="vehicle_selling_price" id="vehicle_selling_price" type="number" placeholder="Vehicle Selling Price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_selling_price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button id="submitVehicleForm"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Submit
                </button>
            </div>

        </form>
    </div>


    {{-- Table for vehicles displaying the tumbnail image,make,model,colour,yom and action button view more,edit,delete --}}
    <div class="max-w-6xl mx-auto py-8">

        <div class="flex flex-row justify-between">
            <h2 class="text-xl font-semibold mb-4">Vehicle List</h2>

            <button id="showVehicleFormButton"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create Vehicle
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-collapse">
                <thead>
                    <tr>
                        <th class="border p-2">Thumbnail</th>
                        <th class="border p-2">Make</th>
                        <th class="border p-2">Model</th>
                        <th class="border p-2">Color</th>
                        <th class="border p-2">YOM</th>
                        <th class="border p-2">Ownership</th>
                        <th class="border p-2">Availability</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through your vehicle data and generate rows -->
                    <!-- Example data: replace this with actual vehicle data -->
                    <tr>
                        <td class="border">
                            <img src="https://imageio.forbes.com/specials-images/imageserve/5d35eacaf1176b0008974b54/0x0.jpg?format=jpg&crop=4560,2565,x790,y784,safe&width=1200" alt="Thumbnail" class=" w-full h-48">
                        </td>
                        <td class="border p-2">Toyota</td>
                        <td class="border p-2">Corolla</td>
                        <td class="border p-2">Blue</td>
                        <td class="border p-2">2023</td>
                        <td class="border p-2">1</td>
                        <td class="border p-2">Available</td>
                        <td class="border p-2">
                            <button class="text-blue-500 mr-2">View More</button>
                            <button class="text-green-500 mr-2">Edit</button>
                            <button class="text-red-500">Delete</button>
                        </td>
                    </tr>
                    <!-- Repeat the above row for each vehicle entry -->
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
