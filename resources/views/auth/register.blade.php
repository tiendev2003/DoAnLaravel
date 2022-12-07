{{--  <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="sdt" value="{{ __('Số điện thoại') }}" />
                <x-jet-input id="sdt" class="block mt-1 w-full" type="text" name="sdt" :value="old('sdt')" required autofocus autocomplete="sdt" />
            </div>
            <div>
                <x-jet-label for="address" value="{{ __('Địa chỉ') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
                <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
            @csrf
                <h2>Đăng ký</h2>
                <p>Đăng nhập với:</p>
               <div class="social">
                    <div class="social-icons facebook">
                        <a href="#" ><i class="fa-brands fa-facebook"></i> Facebook</a>
                    </div>
                    <div class="social-icons google">
                        <a href="#"><i class="fa-brands fa-google"></i> Google</a>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Tên người dùng</h5>
                        <input class="input" type="text" name="name">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                      <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <h5>Số điện thoại</h5>
                        <input class="input" type="text" name="sdt">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                       <i class="fa-sharp fa-solid fa-location-pin"></i>
                    </div>
                    <div>
                        <h5>Địa chỉ</h5>
                        <input class="input" type="text" name="address">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input" type="email" name="email">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Mật khẩu</h5>
                        <input class="input" type="password" name="password">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Nhập lại mật khẩu</h5>
                        <input class="input" type="password" name="password_confirmation">
                    </div>
                </div>
                <div class="terms">
                    <input type="checkbox">
                    <label>Tôi đọc và đồng ý với </label><a >điều khoản sử dụng.</a>
                </div>
                <div class="btn-container">
                <input class="btn-action " type="submit" name="register" value="Đăng ký">
                
                </div>
                <div class="account">
                    <p>Bạn đã có sẵn tài khoản ?</p>
                    <a href="{{ route('login') }}">Đăng nhập </a>
                </div>
                <!-- The Modal -->
              
            </form>
        </div>
    </div>

</x-guest-layout>
