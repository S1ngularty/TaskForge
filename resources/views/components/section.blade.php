@props(['id' => ''])

<div class="py-4 w-[500px]">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-2 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div id="{{ $id }}" class="w-full flex flex-col gap-4 max-h-[500px] overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
