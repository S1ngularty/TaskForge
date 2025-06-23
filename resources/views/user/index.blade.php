<x-app-layout>
  <x-slot name="header" >
    <x-status>
        
    </x-status>
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
      <h5>Shop</h5>
    </x-section>
  </div>

  <div class="flex justify-start flex-row max-h-full">
    <x-section id="task-section">   

    </x-section>

    <x-section id="task-completed">
      
    </x-section>

 <x-section id="shop">
    <div class="flex flex-wrap justify-center gap-3 sm:gap-4">
        <!-- CARD -->
        <div class="w-[48%] sm:w-[45%] md:w-[30%] lg:w-[22%] xl:w-[18%] aspect-square bg-white rounded-xl shadow overflow-hidden">
            <div class="flex flex-col h-full p-3 items-center justify-between">
                <!-- Image -->
                <img src="https://ih1.redbubble.net/image.3178824635.0526/st,small,507x507-pad,600x600,f8f8f8.jpg"
                     alt="Health Potion"
                     class="w-full h-[70px] object-contain rounded" />

                <!-- Title -->
                <h6 class="text-sm font-semibold text-gray-800 text-center leading-tight">Health potion 30%</h6>

                <!-- Price -->
                <p class="text-xs text-gray-600">₱51.00</p>

                <!-- Quantity Selector -->
                <div class="flex items-center gap-2">
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">−</button>
                    <input type="number" value="1" min="1"
                           class="w-10 text-center border border-gray-300 rounded text-xs py-1" />
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">+</button>
                </div>

                <!-- Stock Info -->
                <p class="text-xs text-gray-500">Available: 12 in stock</p>

                <!-- Buy Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded w-full">Buy</button>
            </div>
        </div>

         <div class="w-[48%] sm:w-[45%] md:w-[30%] lg:w-[22%] xl:w-[18%] aspect-square bg-white rounded-xl shadow overflow-hidden">
            <div class="flex flex-col h-full p-3 items-center justify-between">
                <!-- Image -->
                <img src="https://ih1.redbubble.net/image.3178824635.0526/st,small,507x507-pad,600x600,f8f8f8.jpg"
                     alt="Health Potion"
                     class="w-full h-[70px] object-contain rounded" />

                <!-- Title -->
                <h6 class="text-sm font-semibold text-gray-800 text-center leading-tight">Health potion 30%</h6>

                <!-- Price -->
                <p class="text-xs text-gray-600">₱51.00</p>

                <!-- Quantity Selector -->
                <div class="flex items-center gap-2">
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">−</button>
                    <input type="number" value="1" min="1"
                           class="w-10 text-center border border-gray-300 rounded text-xs py-1" />
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">+</button>
                </div>

                <!-- Stock Info -->
                <p class="text-xs text-gray-500">Available: 12 in stock</p>

                <!-- Buy Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded w-full">Buy</button>
            </div>
        </div>

         <div class="w-[48%] sm:w-[45%] md:w-[30%] lg:w-[22%] xl:w-[18%] aspect-square bg-white rounded-xl shadow overflow-hidden">
            <div class="flex flex-col h-full p-3 items-center justify-between">
                <!-- Image -->
                <img src="https://ih1.redbubble.net/image.3178824635.0526/st,small,507x507-pad,600x600,f8f8f8.jpg"
                     alt="Health Potion"
                     class="w-full h-[70px] object-contain rounded" />

                <!-- Title -->
                <h6 class="text-sm font-semibold text-gray-800 text-center leading-tight">Health potion 30%</h6>

                <!-- Price -->
                <p class="text-xs text-gray-600">₱51.00</p>

                <!-- Quantity Selector -->
                <div class="flex items-center gap-2">
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">−</button>
                    <input type="number" value="1" min="1"
                           class="w-10 text-center border border-gray-300 rounded text-xs py-1" />
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">+</button>
                </div>

                <!-- Stock Info -->
                <p class="text-xs text-gray-500">Available: 12 in stock</p>

                <!-- Buy Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded w-full">Buy</button>
            </div>
        </div>

         <div class="w-[48%] sm:w-[45%] md:w-[30%] lg:w-[22%] xl:w-[18%] aspect-square bg-white rounded-xl shadow overflow-hidden">
            <div class="flex flex-col h-full p-3 items-center justify-between">
                <!-- Image -->
                <img src="https://ih1.redbubble.net/image.3178824635.0526/st,small,507x507-pad,600x600,f8f8f8.jpg"
                     alt="Health Potion"
                     class="w-full h-[70px] object-contain rounded" />

                <!-- Title -->
                <h6 class="text-sm font-semibold text-gray-800 text-center leading-tight">Health potion 30%</h6>

                <!-- Price -->
                <p class="text-xs text-gray-600">₱51.00</p>

                <!-- Quantity Selector -->
                <div class="flex items-center gap-2">
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">−</button>
                    <input type="number" value="1" min="1"
                           class="w-10 text-center border border-gray-300 rounded text-xs py-1" />
                    <button class="bg-gray-200 w-6 h-6 rounded text-gray-600 text-sm">+</button>
                </div>

                <!-- Stock Info -->
                <p class="text-xs text-gray-500">Available: 12 in stock</p>

                <!-- Buy Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded w-full">Buy</button>
            </div>
        </div>


        <!-- Copy for more cards -->
    </div>
</x-section>






  </div>
</div>

<!-- Open Button -->

 <button onclick="document.getElementById('taskModal').classList.remove('hidden')" class="bg-blue-600 text-white px-4 py-2 rounded">
          Launch Modal
      </button>
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

