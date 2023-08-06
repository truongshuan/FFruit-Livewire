<x-guest-layout>
    <div class="mb-5 grid place-items-center">
        <div class=" font-bold flex items-center text-lg">
            <a href="/" class="text-[#f28123] mr-2">FFruit</a>
            <p class="text-gray-400"> - Quên mật khẩu</p>
        </div>
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Bạn sẽ nhận được đường dẫn để có thể lấy lại mật khẩu của mình!') }}
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Xác nhận') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>