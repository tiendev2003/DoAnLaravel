{{--  <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
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
            

            <form method="POST" action="{{ route('login') }}">
            @csrf
      
                <h2>Đăng nhập</h2>
                <p>Chào mừng trở lại !</p>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" type="email" name="email">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Mật khẩu</h5>
                        <input class="input" type="password" name="password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Đăng nhập">
                <a class="forgot" href="{{ route('password.request') }}">Quên mật khẩu ?</a>
                <div class="others">
                    <hr>
                    <p>HOẶC</p>
                    <hr>
                </div>
                <div class="social">
                    <div class="social-icons facebook">
                        <a href="/login/facebook" ><i class="fa-brands fa-facebook"></i>  Facebook</a>
                    </div>
                    <div class="social-icons google">
                        <a href="/google/redirect"><i class="fa-brands fa-google"></i>  Google</a>
                    </div>
                </div>
                <div class="account">
                    <p>Bạn chưa có tài khoản ?</p>
                    <a href="{{ route('register') }}">Đăng ký</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
