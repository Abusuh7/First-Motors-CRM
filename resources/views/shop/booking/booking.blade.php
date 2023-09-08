<x-app-layout>



    {{-- Bookigs --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4">
        {{-- Purchase Bookings --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/purchaseBooking.jpg" alt="purchaseBooking" class="w-full h-full">
            <a href=""
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Purchase
                Booking</a>
        </div>

        {{-- Test Drive Booking --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/testBooking.jpg" alt="testBooking" class="w-full h-full">
            <a href=""
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Test
                Drive Booking</a>
        </div>

        {{-- Past Bookings --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/pastBooking.jpg" alt="category 1" class="w-full h-full">
            <a href=""
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Past
                Booking</a>
        </div>

    </div>
    {{-- Bookigs --}}


   <!-- Purchase Bookings -->
   <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    @foreach ($vehicle_details as $booking)
        <div class="bg-white shadow rounded overflow-hidden h-full flex flex-col">
            <div class="relative">
                <img src="\storage\{{ $booking->vehicle_thumbnail }}" alt="product 1" class="w-full h-56">
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
                        {{ $booking->vehicle_model }}</h4>
                </a>
                <div class="flex-grow"></div>
                <div class="flex items-baseline mb-1 space-x-2">
                    <p class="text-xl text-primary font-semibold">Rs
                        {{ number_format($booking->vehicle_selling_price) }}</p>
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
            <a href=""
                class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">{{ ucwords($user_booking_status) }}</a>
        </div>
    @endforeach

</div>
<!-- ./Purchase Bookings -->


</x-app-layout>
