<button {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-2 bg-[#f28123] border
    w-full
    border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#051922]
    focus:bg-[#051922] active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    transition ease-in-out duration-150']) }}>
    <div class="text-center">
        {{ $slot }}
    </div>
</button>
