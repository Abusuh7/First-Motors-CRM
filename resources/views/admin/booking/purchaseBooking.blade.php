<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Purchase Booking') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-8">
        {{-- @if (empty($vehiclesSearch)) --}}

        {{-- <div class="flex flex-row justify-between">
            <h2 class="text-xl font-semibold mb-4">Purchase Booking</h2>
        </div> --}}

        <div class="overflow-x-auto">
            @if (count($user_booking_details1) > 0)
                <table class="w-full border border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-2">Thumbnail</th>
                            <th class="border p-2">Make</th>
                            <th class="border p-2">Model</th>
                            <th class="border p-2">Color</th>
                            <th class="border p-2">YOM</th>
                            {{-- <th class="border p-2">Ownership</th> --}}
                            <th class="border p-2">Availability</th>
                            <th class="border p-2">Booking Status</th>
                            <th class="border p-2">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($user_booking_details1->chunk(5) as $chunk)
                        <tbody>
                            @foreach ($chunk as $vehicle)
                        <tbody>
                            <!-- Loop through your vehicle data and generate rows -->
                            <!-- Example data: replace this with actual vehicle data -->
                            <tr>
                                <td class="border">
                                    <img src="{{ asset('storage/' . $vehicle->vehicle_details->vehicle_thumbnail) }}"
                                        alt="Thumbnail" class=" w-full h-48">
                                </td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_details->vehicle_make) }}</td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_details->vehicle_model) }}</td>
                                <td class="border p-2">{{ ucwords($vehicle->vehicle_details->vehicle_color) }}</td>
                                <td class="border p-2">{{ $vehicle->vehicle_details->vehicle_year_manufactured }}</td>

                                {{-- <td class="border p-2">
                                    @if ($vehicle->vehicle_details->vehicle_ownership === 'new')
                                        Brand New
                                    @elseif ($vehicle->vehicle_details->vehicle_ownership === 'first')
                                        1st Owner
                                    @elseif ($vehicle->vehicle_details->vehicle_ownership === 'second')
                                        2nd Owner
                                    @elseif ($vehicle->vehicle_details->vehicle_ownership === 'third')
                                        3rd Owner
                                    @elseif ($vehicle->vehicle_details->vehicle_ownership === 'fourth')
                                        4th Owner
                                    @else
                                        {{ $vehicle->vehicle_details->vehicle_ownership }} <!-- Handle other cases as needed -->
                                    @endif
                                </td> --}}


                                {{-- <td class="border p-2">1</td> --}}
                                <td class="border p-2">
                                    @if ($vehicle->vehicle_details->availability === 'available')
                                        <b><span
                                                class="text-green-500">{{ ucwords($vehicle->vehicle_details->availability) }}</span></b>
                                    @else
                                        <b><span
                                                class="text-red-500">{{ ucwords($vehicle->vehicle_details->availability) }}</span></b>
                                    @endif
                                <td class="border p-2">
                                    {{-- {{ ucwords($vehicle->booking_status) }} --}}
                                    @if ($vehicle->booking_status === 'pending')
                                        <b><span
                                                class="text-yellow-600">{{ ucwords($vehicle->booking_status) }}</span></b>
                                    @elseif ($vehicle->booking_status === 'accepted')
                                        <b><span
                                                class="text-green-500">{{ ucwords($vehicle->booking_status) }}</span></b>
                                    @elseif ($vehicle->booking_status === 'rejected')
                                        <b><span class="text-red-500">{{ ucwords($vehicle->booking_status) }}</span></b>
                                    @else
                                        <b><span
                                                class="text-green-700">{{ ucwords($vehicle->booking_status) }}</span></b>
                                    @endif
                                </td>
                                <td class="border p-2">
                                    <a href="{{ route('acceptPurchaseBooking', $vehicle->id) }}">
                                        <button
                                            class="text-white bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600 transition duration-200">Accept</button>
                                    </a>
                                    <a href="{{ route('rejectPurchaseBooking', $vehicle->id) }}">
                                        <button
                                            class="text-white bg-red-500 px-4 py-2 rounded-full hover:bg-red-600 transition duration-200">Reject
                                        </button>
                                    </a>
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
            {{ $user_booking_details1->links() }} <!-- Pagination links -->
        @else
            <div class=" border p-4 mx-auto max-w-sm text-center">
                <p class="text-xl">No test drive booking available.0</p>
            </div>
            @endif
        </div>

</x-app-layout>
