{{--  <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>  --}}

<x-guest-layout>

    <img class="wave" src="client/img/c.png">
    <div class="ctain">

        <div class="img">
            <img src="client/img/b.jpg">
        </div>

        <div class="login-container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
              
                <h2>Quên mật khẩu ?</h2>
                <p>Nhập Email của bạn đã đăng ký tài khoản trước đó</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>E-mail</h5>
                        <input class="input" type="email" name="email" :value="old('email')" required autofocus>
                    </div>
                </div>
                <input type="submit" class="btn" value="Gửi Mail">
                  <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="account">
                    <p>Bạn đã nhớ mật khẩu?</p>
                    <a href={{ route('login') }}>Đăng Nhập</a>
                </div>
            </form>
        </div>
    </div>

</x-guest-layout>
