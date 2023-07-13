<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>



    {{-- Form for new product --}}
    <div id="productFromContainer" class="max-w-2xl mx-auto py-8 hidden">

        <form method="POST" action="{{ route('addproduct') }}" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div id="closeProductForm" class=" w-full flex justify-end">
                <span id="closeIcon" class="close-icon">&#10005;</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="product-name">
                    Product Name
                </label>
                <input name="product_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="product-name" type="text" placeholder="Enter product name" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input name="product_price"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="price" type="text" placeholder="Enter price" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea name="product_description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-28 resize-y"
                    id="description" placeholder="Enter description" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image" re>
                    Thumbnail Image
                </label>
                <input name="product_image"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image" type="file" required>
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
                    <option value="luxury">Luxury</option>
                    <option value="Sedan">Sedan</option>
                    <option value="convertible">Convertible</option>
                    <option value="jdm">JDM</option>
                    <option value="sports">Sports</option>
                    <option value="hyper">Hyper</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                    Quantity
                </label>
                <input name="product_stock"
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
                    <option value="instock">Instock</option>
                    <option value="lowstock">Lowstock</option>
                    <option value="outofstock">Outofstock</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button id="closeProductForm"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>



    {{-- Poducts Summery --}}
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">All Products</h2>


            <div class="flex items-center justify-center">
                <input type="text" placeholder="Search..."
                    class="px-4 py-2 w-1/3 border border-gray-300 rounded-l-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <div class="relative ml-2">
                    <label for="filter" class="sr-only">Filter</label>
                    <select id="filter" name="filter"
                        class="block w-24 px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option id="all" value="all">All</option>
                        <option id="instock" value="instock">InStock</option>
                        <option id="lowstock" value="lowstock">LowStock</option>
                        <option id="outofstock" value="outofstock">OutOfStock</option>
                    </select>
                </div>
                <button type="button" name="search"
                    class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Search
                </button>
            </div>

            <br><br>

            <div class=" justify-center w-full flex">
                <button id="showProductFormButton" class="px-4 py-2 bg-blue-500 text-white rounded">Add New
                    Product</button>
            </div>

            <br><br>

            {{-- All Products --}}
            <div id="showallproduct" class="">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">All Products</h2>
                <br>
                <div class="grid grid-cols-1 gap-x-7 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    @foreach ($data as $all)
                        {{-- @if ($all->product_status == 'outofstock') --}}
                        <div class="group">
                            <div class="w-full h-64  rounded-lg bg-gray-200 xl:h-56 xl:w-64">
                                <img src="\storage\{{ $all->product_image }}" class="w-full h-full object-cover"
                                    alt="Product Image">
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{  $all->product_name }}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($all->product_price) }}</p>
                            <div class=" w-full h-10 flex justify-around">
                                {{-- <form action="" method="POST">

                                    <div class="flex  gap-4">
                                        <button id="showEditFormButton" type="button">
                                            <a x-data="{ tooltip: 'Edite' }" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                        </button>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <a x-data="{ tooltip: 'Delete' }" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6" x-tooltip="tooltip">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </form> --}}
                                <form method="POST" action="{{ route('deleteproduct', $all->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" pt-2">
                                        <span>
                                            <i class="fa-solid fa-trash" style="scale: 1.5"></i>
                                        </span>
                                    </button>
                                </form>

                                <button type="button">
                                    <a href="{{ route('editproduct', $all->id) }}">
                                    <span>
                                        <i class="fa-solid fa-pen-to-square" style="scale: 1.5"></i>
                                    </span>
                                    </a>
                                </button>
                            </div>
                        </div>
                        {{-- @endif --}}
                    @endforeach
                </div>
            </div>

            <br><br>

            {{-- Out Of Stock Products --}}
            <div id="showoutofstock" class=" hidden">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Out Of Stock</h2>
                <br>
                <div class="grid grid-cols-1 gap-x-7 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    @foreach ($data as $outofstock)
                        @if ($outofstock->product_status == 'outofstock')
                            <a href="#" class="group">
                                <div class="w-full h-64  rounded-lg bg-gray-200 xl:h-56 xl:w-64">
                                    <img src="\storage\{{ $outofstock->product_image }}"
                                        class="w-full h-full object-cover" alt="Product Image">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{ $outofstock->product_name }}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($outofstock->product_price) }}
                                </p>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <br><br>

            {{-- In Stock Products --}}
            <div id="showinstock" class=" hidden">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">In Stock</h2>
                <br>
                <div class="grid grid-cols-1 gap-x-7 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    @foreach ($data as $instock)
                        @if ($instock->product_status == 'instock')
                            <a href="#" class="group">
                                <div class="w-full h-64  rounded-lg bg-gray-200 xl:h-56 xl:w-64">
                                    <img src="\storage\{{ $instock->product_image }}"
                                        class="w-full h-full object-cover" alt="Product Image">
                                </div>
                                <h3 class="mt-4 text-sm text-gray-700">{{ $instock->product_name }}</h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">$ {{ number_format($instock->product_price) }}</p>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <br><br>

            {{-- Low Stock Products --}}
            <div id="showlowstock" class=" hidden">
                <div id="lowstock" class="">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Low Stock</h2>
                    <br>
                    <div
                        class="grid grid-cols-1 gap-x-7 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                        @foreach ($data as $lowstock)
                            @if ($lowstock->product_status == 'lowstock')
                                <a href="#" class="group">
                                    <div class="w-full h-64  rounded-lg bg-gray-200 xl:h-56 xl:w-64">
                                        <img src="\storage\{{ $lowstock->product_image }}"
                                            class="w-full h-full object-cover" alt="Product Image">
                                    </div>
                                    <h3 class="mt-4 text-sm text-gray-700">{{ $lowstock->product_name }}</h3>
                                    <p class="mt-1 text-lg font-medium text-gray-900">$
                                        {{ number_format($lowstock->product_price) }}
                                    </p>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>




        </div>
    </div>
</x-app-layout>
