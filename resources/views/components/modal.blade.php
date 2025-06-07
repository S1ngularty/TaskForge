@props(['id' => 'modal', 'title' => '','form'=>''])

<!-- Modal Backdrop -->
<div id="{{ $id }}" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm flex items-center justify-center transition-all duration-300">
    <!-- Modal Content -->
    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6 relative animate-fade-in-down">

        <!-- Close Button -->
        <button
            onclick="modalReset()"
            class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-xl font-bold"
        >
            &times;
        </button>

        <!-- Header -->
        @if($title)
            <h2 class="title text-2xl font-semibold text-gray-800 mb-4">{{ $title }}</h2>
        @endif

        <!-- Content -->
        <div class="text-gray-700">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="mt-6 text-right">
            <button
               form="{{$form}}"
                class="taskCreate bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded"
                id="createTaskbtn"
                data-action="create"
            >
                Create Task
            </button>
        </div>
    </div>
</div>

<!-- Animation -->
<style>
    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.3s ease-out;
    }
</style>
