<x-app-layout>
  <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>
  </x-slot>

<div class="flex flex-col max-h-full">
  <div class="flex justify-start flex-row max-h-full">
    <x-section>
      <h4>Task</h4>
    </x-section>
    <x-section>
      <h5>Completed</h5>
    </x-section>
    <x-section>
      <h5>Status</h5>
    </x-section>
  </div>

  <div class="flex justify-start flex-row max-h-full">
    <x-section id="task-section">   

    </x-section>

    <x-section id="task-completed">
      
    </x-section>

    <x-section id="task-done">   
      <button onclick="document.getElementById('taskModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded">
          Launch Modal
      </button>
  </x-section>
  </div>
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

   <x-input
    name="task_id"
    type="hidden"
    
/>

  </form>
</x-modal>
</x-app-layout>
<style>
  .line-through-animate {
  position: relative;
  display: inline-block;
  color: #1f2937; /* Tailwind's gray-800 */
  cursor: pointer;
  user-select: none;
}

.line-through-animate::after {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  height: 2px;
  background-color: currentColor;
  width: 0;
  transition: width 0.5s ease-in-out;
  transform: translateY(-50%);
}

/* This class triggers the animation */
.line-through-animate.active::after {
  width: 100%;
}

</style>

