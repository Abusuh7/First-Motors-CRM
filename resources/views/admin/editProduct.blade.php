<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Form To Edit User --}}
            <div id="formEditContainer" class=" relative inset-0 flex justify-center items-center">
                <div class="bg-white p-8 w-3/6 rounded shadow-lg">
                    <h2 class="text-2xl mb-4">Edit Product</h2>
                    <form method="POST" action="{{ route('updateproduct', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="product-name">
                                Product Name
                            </label>
                            <input name="product_name" value="{{ $product->product_name }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="product-name" type="text" placeholder="Enter product name" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                                Price
                            </label>
                            <input name="product_price" value="{{ $product->product_price }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="price" type="text" placeholder="Enter price" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea name="product_description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-28 resize-y"
                                id="description" placeholder="Enter description" required>{{ $product->product_description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image" >
                                Thumbnail Image
                            </label>
                            <input name="product_image"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="image" type="file" >
                        </div>
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                More Image
                            </label>
                            <input name="product_more_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" multiple>
                        </div> --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                Product Category
                            </label>
                            <select name="product_category"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="category" required>
                                <option value="{{ $product->product_category }}">{{$product->product_category}} (Selected)</option>
                                <option value="luxury">Luxury</option>
                                <option value="Sedan">Sedan</option>
                                <option value="convertible">Convertible</option>
                                <option value="JDM">JDM</option>
                                <option value="sports">Sports</option>
                                <option value="hyper">Hyper</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                                Quantity
                            </label>
                            <input name="product_stock" value="{{ $product->product_stock }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="quantity" type="number" placeholder="Enter quantity" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                Status
                            </label>
                            <select name="product_status"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="status" required>
                                <option value="{{ $product->product_status }}">{{ $product->product_status }} (Selected)</option>
                                <option value="instock">Instock</option>
                                <option value="lowstock">Lowstock</option>
                                <option value="outofstock">Outofstock</option>
                            </select>
                        </div>

                        {{-- <div class="mb-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <input type="text" value="{{ $product->name }}" id="name" class="block mt-1 w-full"
                                type="text" name="name" required autofocus
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">



                        </div>
                        <div class="mb-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <input type="email" value="{{ $user->email }}" id="email" class="block mt-1 w-full"
                                type="email" name="email" required
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">

                        </div> --}}
                        {{-- <div class="mb-4" data-te-input-wrapper-init>
<x-label for="password_confirmation" value="{{ __('Role') }}" />
    <x-input id="password_confirmation" class="block mt-1 w-full" type="number"
        name="role" required  />
</div> --}}
                        {{-- <div class="mb-4" data-te-input-wrapper-init>
                            <x-label for="password" value="{{ __('Password') }}" />
                            <input type="password" value="{{ $user->password }}" id="password"
                                class="block mt-1 w-full" type="password" name="password" required
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">

                        </div> --}}

                        <div>
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
