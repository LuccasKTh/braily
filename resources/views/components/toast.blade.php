@php
    switch ($type) {
        case 'success':
            $typeClass = 'bg-gray-600 text-gray-200';
            $svgColor = 'text-blue-500';
            break;
        
        case 'warning':
            $typeClass = 'bg-gray-600 text-yellow-400';
            $svgColor = 'text-yellow-500';
            break;
        
        case 'danger':
            $typeClass = 'bg-gray-600 text-red-500';
            $svgColor = 'text-red-500';
            break;
    }
@endphp


<div class="fixed top-10 end-28"> 
    <div 
        x-data="{ show: true }"
        x-show="show"
        x-transition
        {{-- x-init="setTimeout(() => show = false, 5000)" --}}
        id="toast-simple" 
        class="flex items-center shadow z-50 w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse divide-x rtl:divide-x-reverse rounded-lg divide-gray-700 space-x {{ $typeClass }}"
        role="alert"
    >
        <svg class="w-5 h-5 {{ $svgColor }} rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
        </svg>
        <div class="ps-4 text-md font-bold">
            {{ $slot }}
        </div>
    </div>
</div>