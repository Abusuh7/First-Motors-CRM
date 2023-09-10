<x-app-layout>


    {{-- Page title --}}
    <div>
        <h2 class="my-6 ml-2 text-3xl font-semibold text-gray-700 dark:text-gray-800">
            Bookings
        </h2>
    </div>


    {{-- Bookigs --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4">
        {{-- Purchase Bookings --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/purchaseBooking.jpg" alt="purchaseBooking" class="w-full h-full">
            <a href="{{ route('purchasebookingdetails') }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Purchase
                Booking</a>
        </div>

        {{-- Test Drive Booking --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/testBooking.jpg" alt="testBooking" class="w-full h-full">
            <a href="{{ route('testdrivebookingdetails') }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Test
                Drive Booking</a>
        </div>

        {{-- Past Bookings --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/pastBooking.jpg" alt="category 1" class="w-full h-full">
            <a href="{{ route('pastbookingdetails') }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Past
                Booking</a>
        </div>

    </div>
    {{-- Bookigs --}}





</x-app-layout>
