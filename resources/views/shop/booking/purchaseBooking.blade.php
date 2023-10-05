<x-app-layout>


    <div>
        <h2 class="my-6 ml-2 text-3xl font-semibold text-gray-700 dark:text-gray-800">
            Purchase Bookings
        </h2>
    </div>

    {{-- @if (empty($user_booking_details))
        <div class="flex justify-center items-center h-screen">
            <p class="font-bold text-lg text-red-600">No purchase bookings at the moment.</p>
        </div>
    @endif --}}

    <!-- Purchase Bookings -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-4 mx-3">

        @foreach ($user_booking_details as $booking)
            <div class="bg-white shadow rounded overflow-hidden h-full flex flex-col">
                <div class="relative">
                    <img src="\storage\{{ $booking->vehicle_details->vehicle_thumbnail }}" alt="product 1"
                        class="w-full h-56">
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
                            {{ $booking->vehicle_details->vehicle_model }}</h4>
                    </a>
                    <div class="flex-grow"></div>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl text-primary font-semibold">Rs
                            {{ number_format($booking->vehicle_details->vehicle_selling_price) }}</p>
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
                @if ($booking->booking_status == 'approved')
                    <a href=""
                        class="block w-full py-1 text-center text-white bg-green-400 border border-green-400 rounded-b hover:bg-transparent hover:text-green-400 transition">Approved</a>
                @elseif ($booking->booking_status == 'pending')
                    <a href=""
                        class="block w-full py-1 text-center text-white bg-red-500 border border-red-500 rounded-b hover:bg-transparent hover:text-red-500 transition">Pending</a>
                @elseif ($booking->booking_status == 'rejected')
                    <a href=""
                        class="block w-full py-1 text-center text-white bg-red-500 border border-red-500 rounded-b hover:bg-transparent hover:text-red-500 transition">Rejected</a>
                @else
                    <a href=""
                        class="block w-full py-1 text-center text-white bg-green-500 border border-green-500 rounded-b hover:bg-transparent hover:text-green-500 transition">Completed</a>
                @endif
            </div>
        @endforeach

    </div>
    <!-- ./Purchase Bookings -->


</x-app-layout>
