<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles Dashboard') }}
        </h2>
    </x-slot>



    {{-- Form for new vehicle  --}}
    <div id="vehicleFromContainer" class="max-w-2xl mx-auto py-8 hidden">

        <form method="POST" action="{{ route('addVehicle') }}" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div id="closeVehicleForm" class=" w-full flex justify-end">
                <span id="closeIcon" class="close-icon">&#10005;</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_type">
                    Vehicle Type
                </label>
                {{-- <input name="vehicle_type" id="vehicle_type" type="text" placeholder="Vehicle Type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="vehicle_type" id="vehicle_type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="luxury">Luxury</option>
                    <option value="Sedan">Sedan</option>
                    <option value="convertible">Convertible</option>
                    <option value="jdm">JDM</option>
                    <option value="sports">Sports</option>
                    <option value="suv">Hyper</option>
                </select>
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
                <select name="vehicle_make" id="vehicle_make"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                {{-- <input name="vehicle_ownership" id="vehicle_ownership" type="text" placeholder="vehicle_ownership"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                <select name="vehicle_ownership" id="vehicle_ownership"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="new">Brand New</option>
                    <option value="first">1st Owner</option>
                    <option value="second">2nd Owner</option>
                    <option value="third">3rd Owner</option>
                    <option value="fourth">4th Owner</option>
                </select>
                @error('vehicle_ownership')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <!-- Previous Owner Details Section if its not brand new -->
            <div id="previousOwnerDetailsSection" class="mb-4">
                <label class="block text-gray-700 text-base font-bold mb-2" for="previous_owner_details">
                    Previous Owner Details
                </label>

                <!-- First Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                        First Name
                    </label>
                    <input name="first_name" id="first_name" type="text" placeholder="First Name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                        Last Name
                    </label>
                    <input name="last_name" id="last_name" type="text" placeholder="Last Name"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                        Phone Number
                    </label>
                    <input name="phone_number" id="phone_number" type="text" placeholder="Phone Number"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Email (Optional) -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email (Optional)
                    </label>
                    <input name="email" id="email" type="email" placeholder="Email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                        Gender
                    </label>
                    <select name="gender" id="gender"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">
                        Date of Birth
                    </label>
                    <input name="dob" id="dob" type="date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Age -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
                        Age
                    </label>
                    <input name="age" id="age" type="number" placeholder="Age"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Occupation -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="occupation">
                        Occupation
                    </label>
                    <input name="occupation" id="occupation" type="text" placeholder="Occupation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Address
                    </label>
                    <input name="address" id="address" type="text" placeholder="Address"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- City -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                        City
                    </label>
                    <input name="city" id="city" type="text" placeholder="City"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- State -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="state">
                        State
                    </label>
                    <input name="state" id="state" type="text" placeholder="State"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <!-- Zip Code -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="zip_code">
                        Zip Code
                    </label>
                    <input name="zip_code" id="zip_code" type="number" placeholder="Zip Code"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                </div>

                <!-- Country -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                        Country
                    </label>
                    <input name="country" id="country" type="text" placeholder="Country"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_images" accept="image/*">
                    Vehicle More Image
                </label>
                <input name="vehicle_images[]" id="vehicle_images" type="file" multiple accept="image/*"
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
                <input name="vehicle_cost_price" id="vehicle_cost_price" type="number"
                    placeholder="Vehicle Cost Price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                @error('vehicle_cost_price')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_selling_price">
                    Vehicle Selling Price
                </label>
                <input name="vehicle_selling_price" id="vehicle_selling_price" type="number"
                    placeholder="Vehicle Selling Price"
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

    {{-- Search bar with filter option where you can filter by many options --}}
    <form action="{{ route('searchVehicle') }}" method="GET">
        <div class="mb-3 mt-5 flex justify-center flex-row">
            <div class="relative mb-4 flex w-1/2 flex-wrap items-stretch">
                <input type="search" name="search"
                    class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-red-500 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-black dark:placeholder:text-black dark:focus:border-primary"
                    placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                <!--Search button-->
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    Search
                </button>
            </div>

            <select id="searchBy" name="searchBy"
                class=" w-15 h-10 border-2 ml-5 border-solid border-neutral-300 focus:outline-none focus:border-sky-500 text-black rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                <option value="all" selected="">All</option>
                <option value="make">Make</option>
                <option value="model">Model</option>
                <option value="ownership">Ownership</option>
                <option value="color">Color</option>
                <option value="year">Year Manufactured</option>
                <option value="license_plate">Plate</option>
                <option value="availability">Availability</option>
                <option value="transmission">Transmission</option>
            </select>
        </div>
    </form>



    {{-- Table for vehicles displaying the tumbnail image,make,model,colour,yom and action button view more,edit,delete --}}
    <div class="max-w-7xl mx-auto py-8">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif


        @if (empty($vehiclesSearch))

            <div class="flex flex-row justify-between">
                <h2 class="text-xl font-semibold mb-4">Vehicle List</h2>

                <button id="showVehicleFormButton"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Vehicle
                </button>
            </div>

            <div class="overflow-x-auto">
                @if (count($vehicles) > 0)
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
                        @foreach ($vehicles->chunk(5) as $chunk)
                            <tbody>
                                @foreach ($chunk as $vehicle)
                            <tbody>
                                <!-- Loop through your vehicle data and generate rows -->
                                <!-- Example data: replace this with actual vehicle data -->
                                <tr>
                                    <td class="border">
                                        <img src="{{ asset('storage/' . $vehicle->vehicle_thumbnail) }}"
                                            alt="Thumbnail" class=" w-full h-48">
                                    </td>
                                    <td class="border p-2">{{ ucwords($vehicle->vehicle_make) }}</td>
                                    <td class="border p-2">{{ ucwords($vehicle->vehicle_model) }}</td>
                                    <td class="border p-2">{{ ucwords($vehicle->vehicle_color) }}</td>
                                    <td class="border p-2">{{ $vehicle->vehicle_year_manufactured }}</td>

                                    <td class="border p-2">
                                        @if ($vehicle->vehicle_ownership === 'new')
                                            Brand New
                                        @elseif ($vehicle->vehicle_ownership === 'first')
                                            1st Owner
                                        @elseif ($vehicle->vehicle_ownership === 'second')
                                            2nd Owner
                                        @elseif ($vehicle->vehicle_ownership === 'third')
                                            3rd Owner
                                        @elseif ($vehicle->vehicle_ownership === 'fourth')
                                            4th Owner
                                        @else
                                            {{ $vehicle->vehicle_ownership }} <!-- Handle other cases as needed -->
                                        @endif
                                    </td>


                                    {{-- <td class="border p-2">1</td> --}}
                                    <td class="border p-2">{{ ucwords($vehicle->availability) }}</td>
                                    <td class="border p-2">
                                        <button class="text-blue-500 mr-2">View More</button>
                                        <a href="{{ route('editvehicle', $vehicle->id) }}"><button class="text-green-500 mr-2">Edit</button></a>
                                        <form action="{{ route('deletevehicle', $vehicle->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                                <!-- Repeat the above row for each vehicle entry -->
                            </tbody>
                        @endforeach
                        </tbody>
                @endforeach
                </table>
                {{ $vehicles->links() }} <!-- Pagination links -->
            @else
                <div class=" border p-4 mx-auto max-w-sm text-center">
                    <p class="text-xl">No vehicles available.</p>
                </div>
        @endif
    </div>
    </div>
@else
    <div class="flex flex-col justify-between">
        <h2 class="text-xl font-semibold mb-4">Vehicle Search</h2>

        <div class="px-6 py-4">
            <a href="{{ route('adminVehiclesDashboard') }}" class="text-blue-700 hover:text-blue-800">Reset
                Search</a>
        </div>

    </div>

    <div class="overflow-x-auto">
        @if (count($vehiclesSearch) > 0)
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
                @foreach ($vehiclesSearch->chunk(5) as $chunk)
                    <tbody>
                        @foreach ($chunk as $vehicle)
                    <tbody>
                        <!-- Loop through your vehicle data and generate rows -->
                        <!-- Example data: replace this with actual vehicle data -->
                        <tr>
                            <td class="border">
                                <img src="{{ asset('storage/' . $vehicle->vehicle_thumbnail) }}" alt="Thumbnail"
                                    class=" w-full h-48">
                            </td>
                            <td class="border p-2">{{ ucwords($vehicle->vehicle_make) }}</td>
                            <td class="border p-2">{{ ucwords($vehicle->vehicle_model) }}</td>
                            <td class="border p-2">{{ ucwords($vehicle->vehicle_color) }}</td>
                            <td class="border p-2">{{ $vehicle->vehicle_year_manufactured }}</td>

                            <td class="border p-2">
                                @if ($vehicle->vehicle_ownership === 'new')
                                    Brand New
                                @elseif ($vehicle->vehicle_ownership === 'first')
                                    1st Owner
                                @elseif ($vehicle->vehicle_ownership === 'second')
                                    2nd Owner
                                @elseif ($vehicle->vehicle_ownership === 'third')
                                    3rd Owner
                                @elseif ($vehicle->vehicle_ownership === 'fourth')
                                    4th Owner
                                @else
                                    {{ $vehicle->vehicle_ownership }} <!-- Handle other cases as needed -->
                                @endif
                            </td>


                            {{-- <td class="border p-2">1</td> --}}
                            <td class="border p-2">{{ ucwords($vehicle->availability) }}</td>
                            <td class="border p-2">
                                <button class="text-blue-500 mr-2">View More</button>
                                <a href="{{ route('editvehicle', $vehicle->id) }}"><button class="text-green-500 mr-2">Edit</button></a>
                                <form action="{{ route('deletevehicle', $vehicle->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Repeat the above row for each vehicle entry -->
                    </tbody>
                @endforeach
                </tbody>
        @endforeach
        </table>
        {{ $vehiclesSearch->links() }} <!-- Pagination links -->
    @else
        <div class=" border p-4 mx-auto max-w-sm text-center">
            <p class="text-xl">No Searched vehicles available.</p>
        </div>
        @endif
    </div>
    </div>

    @endif



    <!-- Display Multiple Images -->
    {{-- @if ($vehicle->vehicle_images)
                    <div class="vehicle-images">
                        @foreach (json_decode($vehicle->vehicle_images, true) as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $vehicle->vehicle_make }} Image"
                                width="150">
                        @endforeach
                    </div>
                @endif --}}



</x-app-layout>
