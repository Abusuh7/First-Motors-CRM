<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Vehicle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="formEditContainer" class=" relative inset-0 flex justify-center items-center">
                <div class="bg-white p-8 w-3/6 rounded shadow-lg">
                    <h2 class="text-2xl mb-4">Edit Vehicle</h2>

                    <form method="POST" action="{{ route('updatevehicle', $vehicle->id) }}" enctype="multipart/form-data"
                        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <div id="closeVehicleForm" class=" w-full flex justify-end">
                            <a href="{{ route('adminVehiclesDashboard') }}"><span id="closeIcon" class="close-icon">&#10005;</span></a>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_type">
                                Vehicle Type
                            </label>
                            {{-- <input name="vehicle_type" id="vehicle_type" type="text" placeholder="Vehicle Type"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                            <select name="vehicle_type" id="vehicle_type"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="{{ $vehicle->vehicle_type }}" selected>{{ ucwords($vehicle->vehicle_type) }} (Selected)</option>
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
                                <option value="{{$vehicle->vehicle_make}}" selected>{{ ucwords($vehicle->vehicle_make) }} (Selected)</option>
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
                            <input name="vehicle_model" id="vehicle_model" type="text" placeholder="Vehicle Model" value="{{ $vehicle->vehicle_model }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('vehicle_model')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_year_manufactured">
                                Vehicle Year Manufactured
                            </label>
                            <input name="vehicle_year_manufactured" id="vehicle_year_manufactured" type="number" value="{{ $vehicle->vehicle_year_manufactured }}"
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
                            <input name="vehicle_year_registered" id="vehicle_year_registered" type="number" value="{{ $vehicle->vehicle_year_registered }}"
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
                                {{-- <option value="">{{ ucwords($vehicle->vehicle_ownership) }}</option> --}}

                                @if ($vehicle->vehicle_ownership == 'new')
                                    <option value="new" selected>Brand New (Selected)</option>
                                @elseif ($vehicle->vehicle_ownership == 'first')
                                    <option value="first" selected>1st Owner (Selected)</option>
                                @elseif ($vehicle->vehicle_ownership == 'second')
                                    <option value="second" selected>2nd Owner (Selected)</option>
                                @elseif ($vehicle->vehicle_ownership == 'third')
                                    <option value="third" selected>3rd Owner (Selected)</option>
                                @elseif ($vehicle->vehicle_ownership == 'fourth')
                                    <option value="fourth" selected>4th Owner (Selected)</option>
                                @endif
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

                        @if ($vehicle->vehicle_ownership != 'new')

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
                                <input name="first_name" id="first_name" type="text" placeholder="First Name" value="{{ $previousOwner->first_name }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Last Name -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                                    Last Name
                                </label>
                                <input name="last_name" id="last_name" type="text" placeholder="Last Name" value="{{ $previousOwner->last_name }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                                    Phone Number
                                </label>
                                <input name="phone_number" id="phone_number" type="text" placeholder="Phone Number" value="{{ $previousOwner->phone_number }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Email (Optional) -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email (Optional)
                                </label>
                                <input name="email" id="email" type="email" placeholder="Email" value="{{ $previousOwner->email }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Gender -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                    Gender
                                </label>
                                <select name="gender" id="gender"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="{{ $previousOwner->gender }}" selected>{{ ucwords($previousOwner->gender)  }} (Selected)</option>
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
                                <input name="dob" id="dob" type="date" value="{{ $previousOwner->dob }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Age -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
                                    Age
                                </label>
                                <input name="age" id="age" type="number" placeholder="Age" value="{{ $previousOwner->age }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Occupation -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="occupation">
                                    Occupation
                                </label>
                                <input name="occupation" id="occupation" type="text" placeholder="Occupation" value="{{ $previousOwner->occupation }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Address -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    Address
                                </label>
                                <input name="address" id="address" type="text" placeholder="Address" value="{{ $previousOwner->address }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- City -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                    City
                                </label>
                                <input name="city" id="city" type="text" placeholder="City" value="{{ $previousOwner->city }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- State -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="state">
                                    State
                                </label>
                                <input name="state" id="state" type="text" placeholder="State" value="{{ $previousOwner->state }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Zip Code -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="zip_code">
                                    Zip Code
                                </label>
                                <input name="zip_code" id="zip_code" type="number" placeholder="Zip Code" value="{{ $previousOwner->zip_code }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                            </div>

                            <!-- Country -->
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                                    Country
                                </label>
                                <input name="country" id="country" type="text" placeholder="Country" value="{{ $previousOwner->country }}"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        </div>

                        @endif


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_color">
                                Vehicle Color
                            </label>
                            <input name="vehicle_color" id="vehicle_color" type="text" placeholder="Vehicle Color" value="{{ $vehicle->vehicle_color }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('vehicle_color')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_mileage">
                                Vehicle Mileage
                            </label>
                            <input name="vehicle_mileage" id="vehicle_mileage" type="number" placeholder="Vehicle Mileage" value="{{ $vehicle->vehicle_mileage }}"
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
                                <option value="{{$vehicle->vehicle_transmission}}" selected>{{ ucwords($vehicle->vehicle_transmission) }} (Selected)</option>
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
                                <option value="{{$vehicle->vehicle_fuel_type}}" selected>{{ ucwords($vehicle->vehicle_fuel_type) }} (Selected)</option>
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
                                <option value="{{$vehicle->vehicle_condition}}" selected>{{ ucwords($vehicle->vehicle_condition) }} (Selected)</option>
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
                            <input name="vehicle_license_plate" id="vehicle_license_plate" type="text" value="{{ $vehicle->vehicle_license_plate }}"
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
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                {{ $vehicle->vehicle_description }}
                            </textarea>
                            @error('vehicle_description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_cost_price">
                                Vehicle Cost Price
                            </label>
                            <input name="vehicle_cost_price" id="vehicle_cost_price" type="number" value="{{ $vehicle->vehicle_cost_price }}"
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
                            <input name="vehicle_selling_price" id="vehicle_selling_price" type="number" value="{{ $vehicle->vehicle_selling_price }}"
                                placeholder="Vehicle Selling Price"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline number-input">
                            @error('vehicle_selling_price')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Availability Dropdown --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="vehicle_availability">
                                Vehicle Availability
                            </label>
                            <select name="vehicle_availability" id="vehicle_availability"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="{{$vehicle->availability}}" selected>{{ ucwords($vehicle->availability) }} (Selected)</option>
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                            </select>
                            @error('vehicle_availability')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button id="submitVehicleForm"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
