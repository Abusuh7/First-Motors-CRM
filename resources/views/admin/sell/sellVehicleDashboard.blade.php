<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sell Vehicles') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-8">
        {{-- @if (empty($vehiclesSearch)) --}}

        <div class="flex flex-row justify-between">
            <h2 class="text-xl font-semibold mb-4">Vehicle List</h2>
        </div>

        <div class="overflow-x-auto">
            @if (count($vehicles) > 0)
                <table class="w-full border border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-2">Thumbnail</th>
                            <th class="border p-2">Make</th>
                            <th class="border p-2">Model</th>
                            <th class="border p-2">Color</th>
                            <th class="border p-2">YOM</th>
                            <th class="border p-2">Ownership</th>
                            <th class="border p-2">Availability</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($vehicles->chunk(5) as $chunk)
                        <tbody>
                            @foreach ($chunk as $vehicle)
                        <tbody>
                            <!-- Loop through your vehicle data and generate rows -->
                            <!-- Example data: replace this with actual vehicle data -->
                            <tr>
                                <td class="border">
                                    <img src="{{ asset('storage/' . $vehicle->vehicle_thumbnail) }}" alt="Thumbnail"
                                        class=" w-full h-48">
                                </td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_make) }}</td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_model) }}</td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_color) }}</td>
                                <td class="border p-2">{{ $vehicle->vehicle_year_manufactured }}</td>

                                <td class="border p-2">
                                    @if ($vehicle->vehicle_ownership === 'new')
                                        Brand New
                                    @elseif ($vehicle->vehicle_ownership === 'first')
                                        1st Owner
                                    @elseif ($vehicle->vehicle_ownership === 'second')
                                        2nd Owner
                                    @elseif ($vehicle->vehicle_ownership === 'third')
                                        3rd Owner
                                    @elseif ($vehicle->vehicle_ownership === 'fourth')
                                        4th Owner
                                    @else
                                        {{ $vehicle->vehicle_ownership }} <!-- Handle other cases as needed -->
                                    @endif
                                </td>


                                {{-- <td class="border p-2">1</td> --}}
                                <td class="border p-2">{{ ucwords($vehicle->availability) }}</td>
                                <td class="border p-2">
                                    {{-- <a href="{{ route('previewVehicleDetails', $vehicle->id) }}">
                                        <button
                                            class="text-white bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600 transition duration-200">Sell
                                            Now</button>
                                    </a> --}}


                                    @if ($vehicle->availability === 'available')
                                        <a href="{{ route('previewVehicleDetails', $vehicle->id) }}">
                                            <button
                                                class="text-white bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600 transition duration-200">Sell
                                                Now</button>
                                        </a>
                                    @else
                                        <button
                                            class="text-white bg-red-500 px-4 py-2 rounded-full hover:bg-red-600 transition duration-200"
                                            disabled>Not Available</button>
                                    @endif


                                    {{-- <a href="{{ route('editvehicle', $vehicle->id) }}"><button
                                            class="text-green-500 mr-2">Edit</button></a>
                                    <form action="{{ route('deletevehicle', $vehicle->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form> --}}

                                </td>
                            </tr>
                            <!-- Repeat the above row for each vehicle entry -->
                        </tbody>
                    @endforeach
                    </tbody>
            @endforeach
            </table>
            {{ $vehicles->links() }} <!-- Pagination links -->
        @else
            <div class=" border p-4 mx-auto max-w-sm text-center">
                <p class="text-xl">No vehicles available.</p>
            </div>
            @endif
        </div>

</x-app-layout>
