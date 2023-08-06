<x-guest-layout>
    <div class="mb-5 grid place-items-center">
        <div class=" font-bold flex items-center text-lg">
            <a href="/" class="text-[#f28123] mr-2">FFruit</a>
            <p class="text-gray-400"> - Đăng ký tài khoản</p>
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Họ và tên')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-3">
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>

        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Bạn đã có tài khoản?') }}
        </a>
        <div class="flex items-center mt-4" onclick="onClick(event)">
            <x-primary-button class="">
                {{ __('Đăng ký') }}
            </x-primary-button>
        </div>
    </form>
    @push('srcipts')
    <script>
        function onClick(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'register'}).then(function(token) {
                        document.getElementById("g-recaptcha-response").value = token;
                        document.getElementById('register-form').submit();
                    });
                });
                }
    </script>
    @endpush
</x-guest-layout>