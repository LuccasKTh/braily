<fieldset>
    <div class="grid gap-x-5 gap-y-3 sm:grid-cols-3">
        <div class="col-span-3">
            <x-input-label for="description" :value="__('Nome')" />
            <x-text-input 
                id="description" 
                class="block mt-1 w-full" 
                type="text" 
                name="description"
                :value="@isset($user->id) ? $user->description : old('description')"
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
    </div>
    <div class="mt-4">
        <x-primary-button>
            {{ isset($user->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>