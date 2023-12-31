<x-app-layout>



    <!-- Luxury Catagory -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">JDM</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            @foreach ($data as $luxury)
            <div class="bg-white shadow rounded overflow-hidden h-full flex flex-col">
                <div class="relative">
                    <img src="\storage\{{ $luxury->vehicle_thumbnail }}" alt="product 1" class="w-full h-56">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
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
                            {{  $luxury->vehicle_model }}</h4>
                    </a>
                    <div class="flex-grow"></div>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">Rs {{ number_format($luxury->vehicle_selling_price) }}</p>
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
                <a href="{{ route('viewproduct', $luxury->id) }}"
                    class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">View</a>
            </div>
            @endforeach

        </div>
    </div>
<!-- ./Luxury Catagory -->


</x-app-layout>
