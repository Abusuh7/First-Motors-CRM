<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicle Infomation') }}
        </h2>
    </x-slot>


    <div class="flex flex-row h-full">
        <!-- Image Grid -->
        <div class="grid gap-4 max-w-3xl">
            <div id="mainImageContainer">
                <img id="mainImage" class="h-auto max-w-full rounded-lg"
                    src="{{ asset('storage/' . $vehicles->vehicle_thumbnail) }}" alt="">
            </div>
            <div class="grid grid-cols-5 gap-4" id="thumbnailContainer">
                @foreach (json_decode($vehicles->vehicle_images, true) as $image)
                    <div class="thumbnail">
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $image) }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Vehicle Details Grid -->
        <div class=" w-full h-full">
            <div class="p-4 border rounded shadow-md">
                <h2 class="text-xl font-semibold mb-4">{{ $vehicles->vehicle_model }}</h2>
                <!-- Add styling to the details -->
                <div class="details-grid grid grid-cols-2 gap-4">
                    <div><strong>Vehicle Type:</strong> {{ ucwords($vehicles->vehicle_type) }}</div>
                    <div><strong>Make:</strong> {{ strtoupper($vehicles->vehicle_make) }}</div>
                    <div><strong>Year Manufactured:</strong> {{ $vehicles->vehicle_year_manufactured }}</div>
                    <div><strong>Year Registered:</strong> {{ $vehicles->vehicle_year_registered }}</div>
                    <div><strong>Ownership:</strong>
                        @if ($vehicles->vehicle_ownership === 'new')
                            Brand New
                        @elseif ($vehicles->vehicle_ownership === 'first')
                            1st Owner
                        @elseif ($vehicles->vehicle_ownership === 'second')
                            2nd Owner
                        @elseif ($vehicles->vehicle_ownership === 'third')
                            3rd Owner
                        @elseif ($vehicles->vehicle_ownership === 'fourth')
                            4th Owner
                        @else
                            {{ ucwords($vehicles->vehicle_ownership) }} <!-- Handle other cases as needed -->
                        @endif
                    </div>

                    <div><strong>Color:</strong> {{ $vehicles->vehicle_color }}</div>
                    <div><strong>Mileage:</strong> {{ number_format($vehicles->vehicle_mileage) }} Km</div>
                    <div><strong>Transmission:</strong> {{ ucwords($vehicles->vehicle_transmission) }}</div>
                    <div><strong>Fuel Type:</strong> {{ ucwords($vehicles->vehicle_fuel_type) }}</div>
                    <div><strong>Condition:</strong> {{ ucwords($vehicles->vehicle_condition) }}</div>
                    <div><strong>License Plate:</strong> {{ $vehicles->vehicle_license_plate }}</div>
                    <div><strong>Description:</strong> {{ $vehicles->vehicle_description }}</div>
                    <div><strong>Cost Price:</strong> ${{ number_format($vehicles->vehicle_cost_price) }}</div>
                    <div><strong>Selling Price:</strong> ${{ number_format($vehicles->vehicle_selling_price) }}</div>
                    <div><strong>Availability:</strong>
                        @if ($vehicles->availability == 'available')
                            <b><span class="text-green-500">Available</span></b>
                        @else
                            <b><span class="text-red-500">Sold</span></b>
                        @endif
                    </div>
                    {{-- <div><strong>Availability:</strong> {{ ucfirst($vehicles->availability) }}</div> --}}
                </div>

                @if ($vehicles->vehicle_ownership != 'new')
                        <!--Button to toggle the previous owner details-->
                        <div class="flex flex-col justify-center w-full">
                            <div class="w-full flex justify-center">
                                <button class="
                                bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center my-4
                                " id="previousOwnerInfoBtn">View Previous Owner Details</button>
                            </div>
                            <!-- Display Previous Owner Details if not brand new -->
                            <div class="details-grid grid grid-cols-2 gap-4 hidden" id="previousOwnerInfo">
                                <div><strong>Previous Owner:</strong> {{ $previousOwners->first_name }}
                                    {{ $previousOwners->last_name }}</div>
                                <div><strong>Owner's Phone:</strong> {{ $previousOwners->phone_number }}</div>
                                <div><strong>Owner's Email:</strong> {{ $previousOwners->email }}</div>
                                <div><strong>Owner's Address:</strong> {{ $previousOwners->address }}</div>
                                <div><strong>Owner's City:</strong> {{ $previousOwners->city }}</div>
                                <div><strong>Owner's State:</strong> {{ $previousOwners->state }}</div>
                                <div><strong>Owner's Zip:</strong> {{ $previousOwners->zip_code }}</div>
                                <div><strong>Owner's Country:</strong> {{ $previousOwners->country }}</div>

                            </div>
                        </div>


                        <!-- Add other previous owner details here -->
                    @endif

            </div>
        </div>
    </div>






</x-app-layout>
