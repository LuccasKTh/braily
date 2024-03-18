<fieldset>

    <div class="flex flex-col">
        <div class="flex flex-row gap-3 items-stretch">
            <x-input-label for="title" class="py-0.5 self-end mt-0.5" :value="__('Título da Aula')" />
    
            <label id="title-error" class="error self-start text-yellow-500 text-xs font-medium px-2 py-0.5 rounded dark:bg-gray-700/70 dark:text-yellow-500 border border-yellow-500" for="title" style="display: none"></label>
        </div>
    
        <div class="flex gap-4">
    
            <div class="w-full">

                <x-text-input 
                    id="student_id"
                    type="hidden"
                    name="student_id"
                    :value="request('id')"
                />
    
                <x-text-input 
                    id="title" 
                    class="block w-full" 
                    type="text" 
                    name="title"
                    :value="isset($lesson->id) ? $lesson->title : old('title')"
                    :autofocus="isset($lesson->id) ? false : true"
                    required
                />
    
            </div>
    
            <div class="w-32 flex items-center">
    
                <x-primary-button id="btnFormTitle" class="w-full justify-center">
                    {{ isset($lesson->id) ? "Alterar" : "Adicionar" }}
                </x-primary-button>
    
            </div>
    
        </div>
    </div>

</fieldset>