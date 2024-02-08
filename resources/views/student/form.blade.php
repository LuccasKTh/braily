<fieldset>
    <div>
        <x-input-label for="name" :value="__('Nome do Aluno')" />
        <x-text-input 
            id="name" 
            class="block mt-1 w-full" 
            type="text" 
            name="name"
            :value="@isset($student->id) ? __($student->name) : old('name')"
            required 
            autofocus 
            autocomplete="name" 
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="age" :value="__('Idade do Aluno')" />
        <x-text-input 
            id="age" 
            class="block mt-1 w-full" 
            type="text" 
            name="age"
            :value="@isset($student->id) ? __($student->age) : old('age')"
            required 
            autofocus 
        />
        <x-input-error :messages="$errors->get('age')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="registration" :value="__('Matrícula do Aluno')" />
        <x-text-input 
            id="registration" 
            class="block mt-1 w-full" 
            type="text" 
            name="registration"
            :value="@isset($student->id) ? __($student->registration) : old('registration')"
            required 
            autofocus 
        />
        <x-input-error :messages="$errors->get('registration')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="education" :value="__('Escolaridade do Aluno')" />
        <x-select-input 
            id="education" 
            class="block mt-1 w-full" 
            name="education" 
            selected="" 
            :options="$options_education" 
            :value="old('education')" 
            required 
        />
        <x-input-error :messages="$errors->get('education')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="about" :value="__('Habilidade do Aluno')" />
        <x-select-input id="skill" class="block mt-1 w-full" name="skill" selected="" :options="$options_skills" :value="old('skill')" required />
        <x-input-error :messages="$errors->get('skill')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="about" :value="__('Observações do Aluno')" />
        <x-text-input 
            id="about" 
            class="block mt-1 w-full" 
            type="text" 
            name="about"
            :value="@isset($student->id) ? __($student->about) : old('about')"
            required 
            autofocus 
        />
        <x-input-error :messages="$errors->get('about')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-primary-button>
            @isset($student->id) {{ __("Alterar") }} @else {{ __("Adicionar") }} @endif
        </x-primary-button>
    </div>
</fieldset>