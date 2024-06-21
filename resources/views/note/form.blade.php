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
        <x-input-label for="student_id" :value="__('Lista de Alunos')" />
        <x-select-input 
            id="student_id" 
            class="block mt-1 w-full" 
            name="student_id"
            required 
            autofocus
        >
        
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
        <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="annotation" :value="__('Anotação')" />
        <x-textarea-input 
            id="annotation" 
            class="block mt-1 w-full h-24 resize-y" 
            name="annotation"
            required 
            autofocus
        >

            {{ isset($note->id) ? $note->annotation : old('annotation') }}

        </x-textarea-input>
        <x-input-error :messages="$errors->get('annotation')" class="mt-2" />
    </div>
    <div class="mt-4">
        <x-primary-button>
            {{ isset($note->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>
    </div>
</fieldset>