@props(['id' => ''])

<div class="pt-4 pb-0 px-2 w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-3xl mx-auto">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-2 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div id="{{ $id }}" class="w-full flex flex-col gap-4 max-h-[500px] overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
