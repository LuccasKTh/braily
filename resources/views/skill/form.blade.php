<fieldset>
    <div class="grid gap-x-5 gap-y-3 sm:grid-cols-3">
        <div class="col-span-3">
            <x-input-label for="description" :value="__('Habilidade')" />
            <x-text-input 
                id="description" 
                class="block mt-1 w-full" 
                type="text" 
                name="description"
                :value="@isset($skill->id) ? $skill->description : old('description')"
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
    </div>
    <div class="mt-4">
        <x-primary-button>
            {{ isset($skill->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>