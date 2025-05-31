@props(['name'=>'','label'=>'','options'=>[],'selected'=>'', 'required'=>true])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500']) }}
    >
    @foreach ($options as $value)
        <option value="{{strtolower($value)}}" {{strtolower($value)==strtolower($selected) ? "selected" : '' }}>{{$value}}</option>
    @endforeach
    </select>

</div>
