<x-app-layout>



    <!-- product-detail -->
    <div class="container grid grid-cols-2 gap-6 pt-5">
        {{-- Image Grid --}}
        <div>
            <div class="grid gap-4 max-w-3xl">
                <div id="mainImageContainer">
                    <img id="mainImage" class="h-auto max-w-full rounded-lg"
                        src="{{ asset('storage/' . $viewproduct->vehicle_thumbnail) }}" alt="">
                </div>
                <div class="grid grid-cols-5 gap-4" id="thumbnailContainer">
                    @foreach (json_decode($viewproduct->vehicle_images, true) as $image)
                        <div class="thumbnail">
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $image) }}"
                                alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Details --}}
        <div>
            <h2 class="text-3xl font-medium uppercase mb-2">{{ $viewproduct->vehicle_model }}</h2>

            <div class="space-y-2">
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_type) }}</span>
                </p>
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Make: </span>
                    <span class="text-gray-600">{{ strtoupper($viewproduct->vehicle_make) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">YOM: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_year_manufactured) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">YOR: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_year_registered) }}</span>
                </p>
                {{-- Display the condition BRand new if the vehicle_condition is new else show the ownership --}}
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Ownership: </span>
                    <span class="text-gray-600">
                        @if ($viewproduct->vehicle_ownership === 'new')
                            Brand New
                        @elseif ($viewproduct->vehicle_ownership === 'first')
                            1st Owner
                        @elseif ($viewproduct->vehicle_ownership === 'second')
                            2nd Owner
                        @elseif ($viewproduct->vehicle_ownership === 'third')
                            3rd Owner
                        @elseif ($viewproduct->vehicle_ownership === 'fourth')
                            4th Owner
                        @endif
                    </span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Transmission: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_transmission) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Fuel Type: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_fuel_type) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Color: </span>
                    <span class="text-gray-600">{{ $viewproduct->vehicle_color }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">License Plate: </span>
                    <span class="text-gray-600">{{ ucwords($viewproduct->vehicle_license_plate) }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Mileage: </span>
                    <span class="text-gray-600">{{ number_format($viewproduct->vehicle_mileage) }} Km</span>
                </p>


            </div>

            {{-- <p class="mt-4 text-gray-600">{{ $viewproduct->vehicle_description }}</p> --}}
            @if ($viewproduct->vehicle_description != null)
                <div class=" py-2">
                    <button id="viewDescriptionBtn"
                        class="bg-primary border border-primary text-white px-8 py-1  font-medium rounded uppercase flex items-center gap-1 hover:bg-transparent hover:text-primary transition">
                        View Description
                    </button>
                    <p class="space-x-2 hidden" id="descriptionShow">
                        <span class="text-gray-800 font-semibold">Description: </span>
                        <span class="text-gray-600">{{ $viewproduct->vehicle_description }}</span>
                    </p>
                </div>
            @endif


            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-xl text-primary font-semibold">Rs
                    {{ number_format($viewproduct->vehicle_selling_price) }}
                </p>
                {{-- <p class="text-base text-gray-400 line-through">{{ $viewproduct->product_price }}</p> --}}
            </div>





            <div class="mt-6 flex gap-3 border-b border-gray-200 pb-5 pt-5">
                <a href="#"
                    class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition">
                    <i class="fa-solid fa-bag-shopping"></i> Purchase
                </a>
                <a href="#"
                    class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition">
                    <i class="fas fa-car"></i> Test Drive
                </a>
            </div>

            <div class="flex gap-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>
        </div>


    </div>

    {{-- recormmended products --}}
    <div class="container pt-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">More Recommended</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            @foreach ($recommended as $recommended)
                <div class="bg-white shadow rounded overflow-hidden h-full flex flex-col">
                    <div class="relative">
                        <img src="\storage\{{ $recommended->vehicle_thumbnail }}" alt="product 1" class="w-full h-56">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="flex-grow pt-4 pb-3 px-4 flex flex-col">
                        <a href="#">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $recommended->vehicle_model }}</h4>
                        </a>
                        <div class="flex-grow"></div>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">$
                                {{ number_format($recommended->vehicle_selling_price) }}</p>
                            {{-- For Discount remove the below comment --}}
                            {{-- <p class="text-sm text-gray-400 line-through">$55.90</p> --}}
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="text-xs text-gray-500 ml-3">(150)</div>
                        </div>
                    </div>
                    <a href="{{ route('viewproduct', $recommended->id) }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">View</a>
                </div>
            @endforeach

        </div>
    </div>






    <!-- ./product-detail-->




</x-app-layout>
