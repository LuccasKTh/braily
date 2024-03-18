<fieldset>
    <div class="grid gap-x-5 gap-y-3 sm:grid-cols-3">
        <div class="col-span-2">
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
        <div class="col-span-1">
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
        <div class="col-span-1">
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
        <div class="col-span-1">
            <x-input-label for="education_id" :value="__('Escolaridade do Aluno')" />
            <x-select-input 
                id="education_id" 
                class="block mt-1 w-full" 
                name="education_id" 
                required 
                autofocus
            >
            
                @foreach($educations as $education)
                    <option 
                        value="{{ $education->id }}"
                        @isset($student->id)
                            @if($student->education_id == $education->id)
                                {{ "selected" }}
                            @endif
                        @endisset    
                    >{{ $education->description }}</option>
                @endforeach 
    
            </x-select-input>
            <x-input-error :messages="$errors->get('education')" class="mt-2" />
        </div>
        <div class="col-span-1">
            <x-input-label for="skill_id" :value="__('Habilidade do Aluno')" />
            <x-select-input id="skill_id" class="block mt-1 w-full" name="skill_id" required autofocu>
            
                @foreach($skills as $skill)
                    <option 
                        value="{{ $skill->id }}"
                        @isset($student->id)
                            @if($student->skill_id == $skill->id)
                                {{ "selected" }}
                            @endif
                        @endisset  
                    >{{ $skill->description }}</option>
                @endforeach 
    
            </x-select-input>
            <x-input-error :messages="$errors->get('skill_id')" class="mt-2" />
        </div>
        <div class="col-span-3">
            <x-input-label for="about" :value="__('Observações do Aluno')" />
            <x-textarea-input>
                {{ isset($student->about) ? $student->about : old('about') }}
            </x-textarea-input>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
        </div>
    </div>
    <div class="mt-4">
        <x-primary-button>
            {{ isset($student->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>