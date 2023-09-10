<x-app-layout>


    {{-- Purchase Page When Product Purchase is Clicked --}}
    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">

        {{-- Form --}}
        <div class="col-span-8 border border-gray-300 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Test Drive Formality Form</h3>
            <form id="reservation-form" action="{{ route('purchaseprocess', $viewproduct->id) }}" method="POST"
                id="payment-form">
                @csrf
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="text-gray-600">First Name <span class="text-primary">*</span></label>
                            <input type="text" name="first_name" id="first_name" class="input-box" value="{{ $user->user_details->last_name }}" required>
                            <div class="error-message" id="first-name-error"></div>
                        </div>
                        <div>
                            <label for="last_name" class="text-gray-600">Last Name <span class="text-primary">*</span></label>
                            <input type="text" name="last_name" id="last_name" class="input-box" required>
                            <div class="error-message" id="last-name-error"></div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="text-gray-600">Email address</label>
                        <input type="email" name="email" id="email" class="input-box" required>
                        <div class="error-message" id="email-error"></div>
                    </div>

                    <div>
                        <label for="contact_number" class="text-gray-600">Contact Number <span class="text-primary">*</span></label>
                        <input type="text" name="contact_number" id="contact_number" class="input-box number-input" required
                            pattern="[0-9]{10}" maxlength="10">
                        <div class="error-message" id="contact-number-error"></div>
                    </div>

                    <div>
                        <label for="address" class="text-gray-600">Address</label>
                        <input type="text" name="address" id="address" class="input-box">
                    </div>

                    <div>
                        <label for="test_drive_date" class="text-gray-600">Test Drive Date <span
                                class="text-primary">*</span></label>
                        <input type="date" name="test_drive_date" id="test_drive_date" class="input-box" required>
                        <div class="error-message" id="test-drive-date-error"></div>
                    </div>

                    <div>
                        <label for="test_drive_time" class="text-gray-600">Test Drive Time <span
                                class="text-primary">*</span></label>
                        <select name="test_drive_time" id="test_drive_time" class="input-box" required>
                            <option value="9:00 AM">9:00 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="2:00 PM">2:00 PM</option>
                            <option value="3:00 PM">3:00 PM</option>
                            <option value="4:00 PM">4:00 PM</option>
                            <option value="5:00 PM">5:00 PM</option>
                        </select>
                        <div class="error-message" id="test-drive-time-error"></div>
                    </div>
                </div>


                <div x-data="{ isChecked: false }">
                    <div class="flex items-center mb-4 mt-2">
                        <input type="checkbox" name="agreement" id="agreement" x-model="isChecked"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm">
                            I agree to the <a href="#" class="text-primary">terms & conditions</a>
                        </label>
                    </div>

                    <br>
                    <div id="success-message"
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4 hidden">
                        Payment successful, Your Reservation is being processed!
                    </div>

                    <div id="error-message"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4 hidden">
                        You have already made a purchase booking!
                    </div>

                    <button
                        class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium"
                        :class="{ 'bg-opacity-50 cursor-not-allowed': !isChecked }"
                        x-bind:href="isChecked ? '#' : null">
                        Checkout
                    </button>

                </div>
            </form>

        </div>

        {{-- Preview Order --}}
        <div class="col-span-4 border border-gray-300 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Order Summary Preview</h4>
            <div class="space-y-2">
                <div class="bg-white shadow rounded overflow-hidden h-full flex flex-col">
                    <div class="relative">
                        <img src="\storage\{{ $viewproduct->vehicle_thumbnail }}" alt="product 1" class="w-full h-57">
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
                                {{ $viewproduct->vehicle_model }}</h4>
                        </a>
                        <div class="flex-grow"></div>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">Rs
                                {{ number_format($viewproduct->vehicle_selling_price) }}</p>
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
                    <a href="{{ route('viewproduct', $viewproduct->id) }}"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">View</a>
                </div>
            </div>

            <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                <p>Total Value</p>
                <p>Rs {{ number_format($viewproduct->vehicle_selling_price) }}</p>
            </div>

            {{-- <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
            <p>Shipping</p>
            <p>
                @if ($viewproduct->vehicle_selling_price > 10000000)
                    Free
                @else
                    Rs25,000
                @endif
            </p>
        </div> --}}

            <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
                <p>Advance Reservation</p>
                {{-- <p>Rs {{ number_format($viewproduct->vehicle_selling_price * 0.005) }}</p> --}}
                <p>Free</p>
            </div>

            <div class="flex justify-between text-gray-800 font-medium py-3 uppercas">
                <p class="font-semibold">Total Payable</p>
                {{-- <p>Rs {{ number_format($viewproduct->vehicle_selling_price * 0.005) }}</p> --}}
                <p>Free</p>
            </div>

            {{-- <div x-data="{ isChecked: false }">
            <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" name="agreement" id="agreement"
                    x-model="isChecked"
                    class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm">
                    I agree to the <a href="#" class="text-primary">terms & conditions</a>
                </label>
            </div>

            <a href="#"
                class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium"
                :class="{ 'bg-opacity-50 cursor-not-allowed': !isChecked }"
                x-bind:href="isChecked ? '#' : null"
            >
                Make Reservation
            </a>
        </div> --}}
        </div>

    </div>
    <!-- ./wrapper -->


</x-app-layout>
