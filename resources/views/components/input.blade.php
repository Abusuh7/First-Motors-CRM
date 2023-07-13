@props(['disabled' => false])

<input value="" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'peer block min-h-[auto]  w-full rounded-xl border-1.5 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none text-gray-500 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0']) !!}>
