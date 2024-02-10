<fieldset>
    <div>
        <x-input-label for="name" :value="__('Nome do Aluno')" />
        <x-text-input 
            id="name" 
            class="block mt-1 w-full" 
            type="text" 
            name="name"
            :value="@isset($student->id) ? $student->name : old('name')"
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
            type="number" 
            name="age"
            :value="@isset($student->id) ? $student->age : old('age')"
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
            type="number" 
            name="registration"
            :value="@isset($student->id) ? $student->registration : old('registration')"
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
            required 
            autofocus
        >
        
            @foreach($educations as $education)
                <option 
                    value="{{ $education->id }}"
                    @isset($student->id)
                        @if($student->education == $education->id)
                            {{ "selected" }}
                        @endif
                    @endisset    
                >{{ $education->option }}</option>
            @endforeach 

        </x-select-input>
        <x-input-error :messages="$errors->get('education')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="skill" :value="__('Habilidade do Aluno')" />
        <x-select-input id="skill" class="block mt-1 w-full" name="skill" required autofocu>
        
            @foreach($skills as $skill)
                <option 
                    value="{{ $skill->id }}"
                    @isset($student->id)
                        @if($student->skill == $skill->id)
                            {{ "selected" }}
                        @endif
                    @endisset  
                >{{ $skill->description }}</option>
            @endforeach 

        </x-select-input>
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
            {{ isset($student->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>