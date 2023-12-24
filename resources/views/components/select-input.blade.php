@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>

    <option value="1" @if ($selecionado == "1") {{ "selected" }} @endif >Iniciante</option>

    <option value="2" @if ($selecionado == "2") {{ "selected" }} @endif >Intermediário</option>

    <option value="3" @if ($selecionado == "3") {{ "selected" }} @endif >Avançado</option>

</select>