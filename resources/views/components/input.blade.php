@props(['type' => 'text', 'name'])

<input {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) }} type="{{ $type }}" name="{{ $name }}" />
