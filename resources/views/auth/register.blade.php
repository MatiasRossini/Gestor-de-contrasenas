<x-authentication-layout>
    <h1 class="text-3xl text-slate-800 font-bold mb-6">{{ __('Crea tu cuenta') }} 🔑</h1>
    <!-- Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <!-- <div>
                <x-jet-label for="name">{{ __('Nombre') }} <span class="text-red-600">*</span></x-jet-label>
                <x-jet-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label for="apellido">{{ __('Apellido (Opcional)') }}</x-jet-label>
                <x-jet-input id="apellido" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
            </div>  -->

            <div>
                <x-jet-label for="email">{{ __('Correo electrónico') }} <span class="text-red-600">*</span></x-jet-label>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <div>
                <x-jet-label for="password">{{ __('Contraseña') }}<span class="text-red-600">*</span></x-jet-label>
                <x-jet-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-jet-label for="password_confirmation">{{ __('Confirmar contraseña') }}<span class="text-red-600">*</span></x-jet-label>
                <x-jet-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <div class="mr-1">
                <label class="flex items-center" name="newsletter" id="newsletter">
                    <input type="checkbox" class="form-checkbox" />
                    <span class="text-sm ml-2">Avisarme sobre actualizaciones</span>
                </label>
            </div>
            <x-jet-button>
                {{ __('Registrarse') }}
            </x-jet-button>                
        </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-6">
                    <label class="flex items-start">
                        <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                        <span class="text-sm ml-2">
                            {!! __('Acepto los :terminos de servicio y las :politicas de privacidad', [
                                'terminos_de_servicio' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm underline hover:no-underline">'.__('Terms of Service').'</a>',
                                'politicas_de_privacidad' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm underline hover:no-underline">'.__('Privacy Policy').'</a>',
                            ]) !!}                        
                        </span>
                    </label>
                </div>
            @endif        
    </form>
    <x-jet-validation-errors class="mt-4" />  
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-slate-200">
        <div class="text-sm">
            {{ __('Ya tenes una cuenta?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
        </div>
    </div>
</x-authentication-layout>
