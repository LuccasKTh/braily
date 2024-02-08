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
    <div class="mt-4">
        <x-primary-button>
            @isset($student->id) {{ __("Alterar") }} @else {{ __("Adicionar") }} @endif
        </x-primary-button>
    </div>
</fieldset>