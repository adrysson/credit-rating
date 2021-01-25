<x-guest-layout>
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

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="cpf" value="{{ __('CPF') }}" />
                <x-jet-input id="cpf" class="block mt-1 w-full" maxlength="15" type="text" name="cpf" :value="old('cpf')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="address.street" value="{{ __('Logradouro') }}" />
                <x-jet-input id="address.street" class="block mt-1 w-full" type="text" name="address[street]" :value="old('address.street')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="address.number" value="{{ __('Número') }}" />
                <x-jet-input id="address.number" class="block mt-1 w-full" type="number" name="address[number]" :value="old('address.number')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="address.complement" value="{{ __('Complemento') }}" />
                <x-jet-input id="address.complement" class="block mt-1 w-full" type="text" name="address[complement]" :value="old('address.complement')" />
            </div>
            <div class="mt-4">
                <x-jet-label for="address.neighborhood" value="{{ __('Bairro') }}" />
                <x-jet-input id="address.neighborhood" class="block mt-1 w-full" type="text" name="address[neighborhood]" :value="old('address.neighborhood')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="address.city" value="{{ __('Cidade') }}" />
                <x-jet-input id="address.city" class="block mt-1 w-full" type="text" name="address[city]" :value="old('address.city')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="address.state" value="{{ __('Estado') }}" />
                <x-jet-input id="address.state" class="block mt-1 w-full" type="text" name="address[state]" :value="old('address.state')" required />
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
</x-guest-layout>
