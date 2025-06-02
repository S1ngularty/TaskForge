@props(['name' => '','label'=>''])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

 <textarea name="{{$name}}" id="{{$name}}"  {{ $attributes->merge([
        'class' => 'w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500'
    ]) }}></textarea>
