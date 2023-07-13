<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Form To Edit User --}}
            <div id="formEditContainer" class=" relative inset-0 flex justify-center items-center">
                <div class="bg-white p-8 w-3/6 rounded shadow-lg">
                    <h2 class="text-2xl mb-4">Sign Up</h2>
                    <form method="POST" action="{{ route('updateuser', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <input type="text" value="{{ $user->name }}" id="name" class="block mt-1 w-full"
                                type="text" name="name" required autofocus
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">



                        </div>
                        <div class="mb-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <input type="email" value="{{ $user->email }}" id="email" class="block mt-1 w-full"
                                type="email" name="email" required
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">

                        </div>
                        {{-- <div class="mb-4" data-te-input-wrapper-init>
<x-label for="password_confirmation" value="{{ __('Role') }}" />
    <x-input id="password_confirmation" class="block mt-1 w-full" type="number"
        name="role" required  />
</div> --}}
                        <div class="mb-4" data-te-input-wrapper-init>
                            <x-label for="password" value="{{ __('Password') }}" />
                            <input type="password" value="{{ $user->password }}" id="password"
                                class="block mt-1 w-full" type="password" name="password" required readonly
                                style="peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">

                        </div>

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
