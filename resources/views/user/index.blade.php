<x-app-layout>
  <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
  </x-slot>

  <div class="flex justify-start flex-row max-h-full">
<x-section id="task-section">   

</x-section>

<x-section id="task-done">   
<button onclick="document.getElementById('taskModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded">
    Launch Modal
</button>
</x-section>
  </div>

<!-- Open Button -->


<!-- Modal Component -->
<x-modal id="taskModal" title="Welcome!" form="taskForm">
  <form id="taskForm"  method="POST">
    @csrf
     <x-input
    name="title"
    label="Task Name"
    type="text"
    required
/>

<x-select
name="occurence"
label="Occurence"
:options="['Daily','Weekly','Monthly','Yearly']"
selected="daily"
>
</x-select>
<x-text-box name="description" label="Description">
</x-text-box>

  </form>
</x-modal>
</x-app-layout>

