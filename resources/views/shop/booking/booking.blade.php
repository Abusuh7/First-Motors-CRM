<x-app-layout>



{{-- Bookigs --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4">
    {{-- Purchase Bookings --}}
    <div class="relative rounded-sm overflow-hidden group">
        <img src="/images/purchaseBooking.jpg" alt="purchaseBooking" class="w-full h-full">
        <a href=""
            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Purchase Booking</a>
    </div>

{{-- Test Drive Booking --}}
<div class="relative rounded-sm overflow-hidden group">
    <img src="/images/testBooking.jpg" alt="testBooking" class="w-full h-full">
    <a href=""
        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Test Drive Booking</a>
</div>

{{-- Past Bookings --}}
<div class="relative rounded-sm overflow-hidden group">
    <img src="/images/pastBooking.jpg" alt="category 1" class="w-full h-full">
    <a href=""
        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">Past Booking</a>
</div>

</div>
{{-- Bookigs --}}


<!-- wishlist -->
<div class="col-span-9 space-y-4">
    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="../assets/images/products/product6.jpg" alt="product 6" class="w-full">
        </div>
        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Italian L shape</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
        </div>
        <div class="text-primary text-lg font-semibold">$320.00</div>
        <a href="#"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">add
            to cart</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>

    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="../assets/images/products/product5.jpg" alt="product 6" class="w-full">
        </div>
        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Dining Table</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-green-600">In Stock</span></p>
        </div>
        <div class="text-primary text-lg font-semibold">$320.00</div>
        <a href="#"
            class="px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">add
            to cart</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>

    <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
        <div class="w-28">
            <img src="../assets/images/products/product10.jpg" alt="product 6" class="w-full">
        </div>
        <div class="w-1/3">
            <h2 class="text-gray-800 text-xl font-medium uppercase">Sofa</h2>
            <p class="text-gray-500 text-sm">Availability: <span class="text-red-600">Out of Stock</span></p>
        </div>
        <div class="text-primary text-lg font-semibold">$320.00</div>
        <a href="#"
            class="cursor-not-allowed px-6 py-2 text-center text-sm text-white bg-red-400 border border-red-400 rounded transition uppercase font-roboto font-medium">add
            to cart</a>

        <div class="text-gray-600 cursor-pointer hover:text-primary">
            <i class="fa-solid fa-trash"></i>
        </div>
    </div>
</div>
<!-- ./wishlist -->


</x-app-layout>
