<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="mb-5 grid place-items-center">
        <div class=" font-bold flex items-center text-lg">
            <a href="/" class="text-[#f28123] mr-2">FFruit</a>
            <p class="text-gray-400"> - Admin</p>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.login') }}" autocomplete="off" id="login-form">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-3">
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-[#f28123] shadow-sm focus:ring-[#f28123]" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ghi nhớ tài khoản') }}</span>
                </label>
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#f28123]"
                        href="{{ route('password.request') }}">
                        {{ __('Quên mật khẩu?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button onclick="onClick(event)">
                {{ __('Đăng nhập') }}
            </x-primary-button>
        </div>
    </form>
    @push('srcipts')
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'login'}).then(function(token) {
                    document.getElementById("g-recaptcha-response").value = token;
                    document.getElementById('login-form').submit();
                });
            });
            }
    </script>
    @endpush
</x-guest-layout>