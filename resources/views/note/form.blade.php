<fieldset>
    <div>
        <x-input-label for="title" :value="__('Título da Anotação')" />
        <x-text-input 
            id="title" 
            class="block mt-1 w-full"  
            type="text" 
            name="title"
            :value="@isset($note->id)?$note->title:old('title')"
            required 
            autofocus
        />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="student" :value="__('Lista de Alunos')" />
        <x-select-input 
            id="student" 
            class="block mt-1 w-full" 
            name="student"
            required 
            autofocus
        ><option value="0">Nenhum</option>
        
            @foreach($students as $student)
                <option 
                    value="{{ $student->id }}" 
                    @isset($note->id)
                        @if($note->student_id == $student->id)
                            {{ "selected" }}
                        @endif
                    @endisset
                >{{ $student->name }}</option>
            @endforeach 

        </x-select-input>
        <x-input-error :messages="$errors->get('education')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="annotation" :value="__('Anotação')" />
        <x-textarea-input 
            id="annotation" 
            class="block mt-1 w-full h-24" 
            name="annotation"
            required 
            autofocus
        >
        {{ isset($note->id) ? $note->annotation : old('annotation') }}
        </x-textarea-input>
        <x-input-error :messages="$errors->get('education')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-primary-button>
            {{ isset($note->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>