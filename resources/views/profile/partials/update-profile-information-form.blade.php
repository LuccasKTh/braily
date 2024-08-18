<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Atualize as informações do perfil da sua conta e seu endereço de email") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="skill_id" :value="__('Habilidade')" />
            <x-select-input id="skill_id" class="block mt-1 w-full" name="skill_id" required autofocus>
        
                @foreach($skills as $skill)
                    <option 
                        value="{{ $skill->id }}"
                        @if($user->teacher->skill_id == $skill->id)
                            {{ "selected" }}
                        @endif
                    >{{ $skill->description }}</option>
                @endforeach 
    
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('skill_id')" />
        </div>

        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Informações Adicionais') }}
            </h2>
        </header>

        <div>
            <x-input-label for="city" :value="__('Cidade')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->teacher->city)" autofocus autocomplete="city" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="state" :value="__('Estado')" />
            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $user->teacher->state)" autofocus autocomplete="state" />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>

        <div>
            <x-input-label for="institution" :value="__('Instituição')" />
            <x-text-input id="institution" name="institution" type="text" class="mt-1 block w-full" :value="old('institution', $user->teacher->institution)" autofocus autocomplete="institution" />
            <x-input-error class="mt-2" :messages="$errors->get('institution')" />
        </div>

        <div>
            <x-input-label for="profession_time" :value="__('Tempo de Profissão')" />
            <x-text-input id="profession_time" name="profession_time" type="text" class="mt-1 block w-full" :value="old('profession_time', $user->teacher->profession_time)" autofocus autocomplete="profession_time" />
            <x-input-error class="mt-2" :messages="$errors->get('profession_time')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
