<fieldset>

    <div class="flex flex-col">
        <div class="flex flex-row gap-3 items-stretch">
            <x-input-label for="word" class="py-0.5 mt-0.5 self-end" :value="__('Palavra do Tópico')" />
    
            <label id="word-error" class="error self-start text-yellow-500 text-xs font-medium px-2 py-0.5 rounded dark:bg-gray-700/70 dark:text-yellow-500 border border-yellow-500" for="word" style="display: @isset($topic) none @else block @endisset">
                @if(!isset($topic))
                    Adicione um título
                @endif
            </label>
        </div>
    
        <div class="flex gap-4">
    
            <div class="w-full">
    
                <x-text-input 
                    id="topic_id"
                    type="hidden"
                    name="topic_id"
                    :value="isset($topic) ? $topic->id : null"
                />
    
                <x-text-input 
                    id="word" 
                    class="block w-full disabled:opacity-50 disabled:cursor-not-allowed" 
                    type="text" 
                    name="word"
                    autofocus 
                    :disabled="isset($topic->id) ? false : true"
                />
                <x-input-error :messages="$errors->get('word')" class="mt-2" />
                    
            </div>
    
            <div class="w-32 flex items-center">
    
                <x-primary-button 
                    class="w-full justify-center disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="isset($topic->id) ? false : true">
                    {{ "Adicionar" }}
                </x-primary-button>
            
            </div>
                
        </div>
    </div>

</fieldset>