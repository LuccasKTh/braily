@php
    switch ($type) {
        case 'success':
            $typeClass = 'bg-gray-600 text-gray-200';
            $svgColor = 'text-blue-500';
            $svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-7'>
                        <path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' clip-rule='evenodd' />
                    </svg>";
            break;
        
        case 'warning':
            $typeClass = 'bg-gray-600 text-yellow-400';
            $svgColor = 'text-yellow-500';
            $svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-7'>
                        <path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z' clip-rule='evenodd' />
                    </svg>";
            break;
        
        case 'danger':
            $typeClass = 'bg-gray-600 text-red-500';
            $svgColor = 'text-red-500';
            $svg = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-7'>
                        <path fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z' clip-rule='evenodd' />
                    </svg>";
            break;
    }
@endphp


<div class="fixed bottom-8 end-8"> 
    <div 
        x-data="{ show: true }"
        x-show="show"
        x-transition.duration.700ms
        x-init="setTimeout(() => show = false, 8000)"
        id="toast-simple" 
        class="flex items-center shadow z-50 w-full max-w-md p-4 space-x-4 rtl:space-x-reverse divide-x rtl:divide-x-reverse rounded-lg divide-gray-700 space-x {{ $typeClass }}"
        role="alert"
    >
        {!! $svg !!}
        <div class="ps-4 text-md font-bold">
            {{ $slot }}
        </div>
    </div>
</div>