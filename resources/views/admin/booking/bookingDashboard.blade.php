<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
    </x-slot>

    {{-- Bookigs Admin View--}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 py-4">

        {{-- Test Drive Booking --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/testBooking.jpg" alt="testBooking" class="w-full h-full">
            <a href="{{ route('adminTestdriveBooking') }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Test
                Drive Booking</a>
        </div>

        {{-- Past Bookings --}}
        <div class="relative rounded-sm overflow-hidden group">
            <img src="/images/pastBooking.jpg" alt="category 1" class="w-full h-full">
            <a href="{{ route('adminPurchaseBooking') }}"
                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Purchase Booking</a>
        </div>

    </div>
    {{-- Bookigs Admin View --}}

</x-app-layout>
