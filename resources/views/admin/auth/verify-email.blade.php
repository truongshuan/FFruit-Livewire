<x-guest-layout>
    <div class="mb-5 grid place-items-center">
        <div class=" font-bold flex items-center text-lg">
            <a href="/" class="text-[#f28123] mr-2">FFruit</a>
            <p class="text-gray-400"> - Xác thực email</p>
        </div>
    </div>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Cảm ơn vì đã đến với Ffruit, hãy xác thực email trước nhé!') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('Email xác thực mới sẽ được gửi đi trong quá trình đăng ký.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Gửi lại') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Đăng xuất') }}
            </button>
        </form>
    </div>
</x-guest-layout>