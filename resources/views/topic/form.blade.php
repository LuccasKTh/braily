<fieldset>
    <div>

        <x-input-label for="title" :value="__('Título do Tópico')" />
        <x-text-input 
            id="title" 
            class="block mt-1 w-full" 
            type="text" 
            name="title"
            :value="@isset($student->id) ? $student->title : old('title')"
            required 
            autofocus 
        />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />

    </div>
    <div>

        <x-input-label for="student" :value="__('Tópico destinado à')" />
        <x-select-input 
            id="student" 
            class="mt-1 w-full" 
            name="student" 
            required 
            autofocus
        ><option value="0">Todos</option>
        
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
        <x-input-error :messages="$errors->get('student')" class="mt-2" />

    </div>
    <div>

        <div>
            <x-input-label for="word" :value="__('Palavras')" />
            <x-text-input 
                id="word" 
                class="block mt-1 w-full" 
                type="text" 
                name="word"
                :value="@isset($student->id) ? $student->word : old('word')"
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('word')" class="mt-2" />
    
            <x-primary-button type="button" onclick="addWord()">
                {{ "Adicionar na lista" }}
            </x-primary-button>

        </div>
        <div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Song</th>
                        <th>Artist</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td>Malcolm Lockyer</td>
                        <td>1961</td>
                    </tr>
                    <tr>
                        <td>Witchy Woman</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                    </tr>
                    <tr>
                        <td>Shining Star</td>
                        <td>Earth, Wind, and Fire</td>
                        <td>1975</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="mt-4">

        <x-primary-button>
            {{ isset($topic->id) ? "Alterar" : "Adicionar" }}
        </x-primary-button>

    </div>
</fieldset>