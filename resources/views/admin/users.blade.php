<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Form To Add New User --}}
            <div id="formContainer" class="max-w-2xl mx-auto py-8 w-full hidden">
                <div class="bg-white p-8 w-full rounded shadow-lg">
                    <div id="closeUserForm" class=" w-full flex justify-end">
                        <span id="closeIcon" class="close-icon">&#10005;</span>
                    </div>
                    <h2 class="text-2xl mb-4">Create New User</h2>
                    {{-- <form method="POST" action="{{ route('newuser') }}">
                        @csrf

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="first_name" value="{{ __('First Name') }}" />
                            <x-input id="first_name" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.first_name" required />
                            <x-input-error for="first_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="last_name" value="{{ __('Last Name') }}" />
                            <x-input id="last_name" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.last_name" required />
                            <x-input-error for="last_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="phone_number" value="{{ __('Phone Number') }}" />
                            <x-input id="phone_number" type="number" class="mt-1 block w-full number-input"
                                 required />
                            <x-input-error for="phone_number" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" type="email" class="mt-1 block w-full"
                                wire:model.defer="state.email" required />
                            <x-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="gender" value="{{ __('Gender') }}" />
                            <select id="gender" name="gender" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <x-input-error for="gender" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="dob" value="{{ __('Date of Birth') }}" />
                            <x-input id="dob" type="date" class="mt-1 block w-full"
                                wire:model.defer="state.dob" required />
                            <x-input-error for="dob" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="age" value="{{ __('Age') }}" />
                            <x-input id="age" type="number" class="mt-1 block w-full number-input"
                                wire:model.defer="state.age" required />
                            <x-input-error for="age" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="occupation" value="{{ __('Occupation') }}" />
                            <x-input id="occupation" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.occupation" required />
                            <x-input-error for="occupation" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="role" value="{{ __('Role') }}" />
                            <select id="role" name="role" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.role">
                                <option value="admin">Admin</option>
                                <option value="stuff">Stuff</option>
                                <option value="user">User</option>

                                <!-- Add more role options -->
                            </select>
                            <x-input-error for="role" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="address" value="{{ __('Address') }}" />
                            <x-input id="address" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.address" required />
                            <x-input-error for="address" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="city" value="{{ __('City') }}" />
                            <select id="city" name="city" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.city">
                                <option value="colombo">Colombo</option>
                                <option value="kandy">Kandy</option>
                                <option value="galle">Galle</option>
                                <option value="jaffna">Jaffna</option>
                                <option value="negombo">Negombo</option>
                                <option value="dehiwala">Dehiwala</option>
                                <option value="moratuwa">Moratuwa</option>
                                <option value="anuradhapura">Anuradhapura</option>
                                <option value="matara">Matara</option>
                                <option value="kurunegala">Kurunegala</option>
                                <option value="kotte">Kotte</option>
                                <option value="kegalle">Kegalle</option>
                                <option value="ratnapura">Ratnapura</option>
                                <option value="trincomalee">Trincomalee</option>
                                <option value="batticaloa">Batticaloa</option>
                                <option value="badulla">Badulla</option>
                                <option value="gampaha">Gampaha</option>
                                <option value="hambantota">Hambantota</option>
                                <option value="ampara">Ampara</option>
                                <option value="nuwara_eliya">Nuwara Eliya</option>
                                <option value="kalutara">Kalutara</option>
                                <option value="matale">Matale</option>
                                <option value="chilaw">Chilaw</option>
                                <option value="polonnaruwa">Polonnaruwa</option>
                                <option value="panadura">Panadura</option>
                                <option value="kelaniya">Kelaniya</option>
                                <option value="dambulla">Dambulla</option>
                                <option value="wattala">Wattala</option>
                                <option value="puttalam">Puttalam</option>
                                <option value="weligama">Weligama</option>
                                <option value="kalpitiya">Kalpitiya</option>
                                <option value="hikkaduwa">Hikkaduwa</option>
                                <option value="marawila">Marawila</option>
                                <option value="balangoda">Balangoda</option>
                                <option value="narammala">Narammala</option>
                                <option value="awissawella">Awissawella</option>
                                <option value="ambalangoda">Ambalangoda</option>
                                <option value="bandarawela">Bandarawela</option>
                                <option value="kalmunai">Kalmunai</option>
                                <option value="monaragala">Monaragala</option>
                                <option value="gampola">Gampola</option>
                                <!-- Add more city options -->
                            </select>
                            <x-input-error for="city" class="mt-2" />
                        </div>



                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="state" value="{{ __('State') }}" />
                            <select id="state" name="state" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.state">
                                <option value="">Select State</option>
                                <option value="central">Central</option>
                                <option value="eastern">Eastern</option>
                                <option value="north_central">North Central</option>
                                <option value="northern">Northern</option>
                                <option value="north_western">North Western</option>
                                <option value="sabaragamuwa">Sabaragamuwa</option>
                                <option value="southern">Southern</option>
                                <option value="uva">Uva</option>
                                <option value="western">Western</option>
                            </select>
                            <x-input-error for="state" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="zip_code" value="{{ __('Zip Code') }}" />
                            <x-input id="zip_code" type="number"
                                class="mt-1 block w-full number-input
                            "
                                wire:model.defer="state.zip_code" required />
                            <x-input-error for="zip_code" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="country" value="{{ __('Country') }}" />
                            <select id="country" name="country" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.country">
                                <option value="srilanka">Sri Lanka</option>

                                <!-- Add more country options -->
                            </select>
                            <x-input-error for="country" class="mt-2" />
                        </div>

                        <div>
                            <x-button class="ml-4 mt-3">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form> --}}
                    <form method="POST" action="{{ route('newuser') }}">
                        @csrf

                        <div class="col-span-6 sm:col-span-4">
                            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('First Name') }}</label>
                            <input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.first_name" required>
                            <x-input-error for="first_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Last Name') }}</label>
                            <input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.last_name" required>
                            <x-input-error for="last_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Phone Number') }}</label>
                            <input id="phone_number" name="phone_number" type="number" class="mt-1 block w-full number-input" required>
                            <x-input-error for="phone_number" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email') }}</label>
                            <input id="email" name="email" type="email" class="mt-1 block w-full"
                                wire:model.defer="state.email" required>
                            <x-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Gender') }}</label>
                            <select id="gender" name="gender" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <x-input-error for="gender" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Date of Birth') }}</label>
                            <input id="dob" name="dob" type="date" class="mt-1 block w-full"
                                wire:model.defer="state.dob" required>
                            <x-input-error for="dob" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="age" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Age') }}</label>
                            <input id="age" name="age" type="number" class="mt-1 block w-full number-input"
                                wire:model.defer="state.age" required>
                            <x-input-error for="age" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="occupation" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Occupation') }}</label>
                            <input id="occupation" name="occupation" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.occupation" required>
                            <x-input-error for="occupation" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Role') }}</label>
                            <select id="role" name="role" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.role">
                                <option value="admin">Admin</option>
                                <option value="stuff">Stuff</option>
                                <option value="user">User</option>
                                <!-- Add more role options if needed -->
                            </select>
                            <x-input-error for="role" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Address') }}</label>
                            <input id="address" name="address" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.address" required>
                            <x-input-error for="address" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">{{ __('City') }}</label>
                            <select id="city" name="city" class="block w-full mt-1 rounded-md shadow-sm" wire:model.defer="state.city">
                                <option value="" disabled>Select City</option>
                                <option value="colombo">Colombo</option>
                                <option value="kandy">Kandy</option>
                                <option value="galle">Galle</option>
                                <option value="jaffna">Jaffna</option>
                                <option value="negombo">Negombo</option>
                                <option value="dehiwala">Dehiwala</option>
                                <option value="moratuwa">Moratuwa</option>
                                <option value="anuradhapura">Anuradhapura</option>
                                <option value="matara">Matara</option>
                                <option value="kurunegala">Kurunegala</option>
                                <option value="kotte">Kotte</option>
                                <option value="kegalle">Kegalle</option>
                                <option value="ratnapura">Ratnapura</option>
                                <option value="trincomalee">Trincomalee</option>
                                <option value="batticaloa">Batticaloa</option>
                                <option value="badulla">Badulla</option>
                                <option value="gampaha">Gampaha</option>
                                <option value="hambantota">Hambantota</option>
                                <option value="ampara">Ampara</option>
                                <option value="nuwara_eliya">Nuwara Eliya</option>
                                <option value="kalutara">Kalutara</option>
                                <option value="matale">Matale</option>
                                <option value="chilaw">Chilaw</option>
                                <option value="polonnaruwa">Polonnaruwa</option>
                                <option value="panadura">Panadura</option>
                                <option value="kelaniya">Kelaniya</option>
                                <option value="dambulla">Dambulla</option>
                                <option value="wattala">Wattala</option>
                                <option value="puttalam">Puttalam</option>
                                <option value="weligama">Weligama</option>
                                <option value="kalpitiya">Kalpitiya</option>
                                <option value="hikkaduwa">Hikkaduwa</option>
                                <option value="marawila">Marawila</option>
                                <option value="balangoda">Balangoda</option>
                                <option value="narammala">Narammala</option>
                                <option value="awissawella">Awissawella</option>
                                <option value="ambalangoda">Ambalangoda</option>
                                <option value="bandarawela">Bandarawela</option>
                                <option value="kalmunai">Kalmunai</option>
                                <option value="monaragala">Monaragala</option>
                                <option value="gampola">Gampola</option>
                                <!-- Add other city options -->
                            </select>
                            <x-input-error for="city" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="state" class="block text-gray-700 text-sm font-bold mb-2">{{ __('State') }}</label>
                            <select id="state" name="state" class="block w-full mt-1 rounded-md shadow-sm" wire:model.defer="state.state">
                                <option value="" disabled>Select State</option>
                                <option value="central">Central</option>
                                <option value="eastern">Eastern</option>
                                <option value="north_central">North Central</option>
                                <option value="northern">Northern</option>
                                <option value="north_western">North Western</option>
                                <option value="sabaragamuwa">Sabaragamuwa</option>
                                <option value="southern">Southern</option>
                                <option value="uva">Uva</option>
                                <option value="western">Western</option>
                                <!-- Add other state options -->
                            </select>
                            <x-input-error for="state" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="zip_code" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Zip Code') }}</label>
                            <input id="zip_code" name="zip_code" type="number" class="mt-1 block w-full number-input"
                                wire:model.defer="state.zip_code" required>
                            <x-input-error for="zip_code" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="country" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Country') }}</label>
                            <select id="country" name="country" class="block w-full mt-1 rounded-md shadow-sm"
                                wire:model.defer="state.country">
                                <option value="srilanka">Sri Lanka</option>
                                <!-- Add other country options -->
                            </select>
                            <x-input-error for="country" class="mt-2" />
                        </div>

                        <div>
                            <button type="submit" class="ml-4 mt-3">{{ __('Register') }}</button>
                        </div>
                    </form>
                </div>
            </div>




            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                <button id="showFormButton" class="px-4 py-2 bg-blue-500 text-white rounded">Create User</button>


                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">State</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
                            {{-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Team</th> --}}
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                        </tr>
                    </thead>


                    {{-- Iterating through the database for admin --}}
                    @foreach ($admin as $data)
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            <tr class="hover:bg-gray-50">
                                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <div class="relative h-10 w-10">
                                        <img class="h-full w-full rounded-full object-cover object-center"
                                            src="\storage\{{ $data->profile_photo_path }}" alt="" />
                                        <span
                                            class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                    </div>
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-700">{{ $data->name }}</div>
                                        <div class="text-gray-400">{{ $data->email }}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $data->role }}</td>

                                <td class="px-6 py-4">
                                    <form action="{{ route('deleteuser', $data->id) }}" method="POST">

                                        <div class="flex justify-end gap-4">
                                            <button id="showEditFormButton" type="button">
                                                <a x-data="{ tooltip: 'Edite' }" href="{{ route('edituser', $data->id) }}">
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
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
