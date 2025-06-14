// pending task card constructor
function sectionCard(response) {
    return `<div id="${response.task_id}"  class="parentCard w-full h-[200px] bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 mb-4">
            <div class="flex items-center justify-evenly gap-5 p-4">
                <div class="flex flex-col gap-4">
                <div class="flex items-center justify-center">
                    <input type="checkbox" id="completeTask" data-id="${
                       response.ts_id
                    }" class="w-8 h-8 rounded-md border-gray-300 accent-blue-600 transition-all duration-200 ease-in-out checked:scale-110 hover:scale-105 cursor-pointer border-2" />
                </div>
                <div class="flex items-center justify-center">
                    <button id="taskUpdate" data-action="update" data-id="${
                        response.task_id
                    }" class="w-8 h-8 rounded-md border-gray-300 hover:bg-gray-100 cursor-pointer border-2"><i class="fa fa-pencil"></i></button>
                </div>
                <div class="flex items-center justify-center">
                    <button id="taskDelete" data-action="delete" data-id="${
                        response.task_id
                    }" class="w-8 h-8 rounded-md border-gray-300 hover:bg-gray-100 cursor-pointer border-2"><i class="fa fa-trash"></i></button>
                </div>
                </div>
                <div class="inline-block">
                    <h5 class="line-through-animate inline-block text-lg font-semibold text-gray-800 m-0 p-0" >${
                        response.title
                    }</h5>
                    <p class="text-green-600 font-semibold text-xl mt-1">${
                        response.occurence ?? "N/A"
                    }</p>
                    <p class="text-gray-500 mt-2 text-sm">${
                        response.description ?? "No description available"
                    }</p>
                </div>
            </div>
        </div>`;
}

// modal reset to its default (still not working properly)
function modalReset() {
    console.log("clicked")
    const form = $("#taskModal")
    $('.title').text("Create a new task")
    form.trigger("reset")
    $("#taskModal").addClass("hidden");
}

// hidden field attribute manipulation
function idField(id) {
    const idField = document.createElement("input");
    idField.setAttribute("value", id);
    idField.setAttribute("type", "hidden");
    idField.name = "task_id";
    idField.id = "task_id";
    return idField;
}

// remove card
function removeCard(target) {
    target.fadeOut("slow", function () {
        target.remove();
    });
}

// task done animation
function taskDoneAnimation (elem){
    $(elem).find(".line-through-animate").toggleClass("active")
   setTimeout(()=>{
     $(elem).fadeOut("slow",function(){
        $(elem).remove();
    }),
    1000
   })

}

// display the task record
function taskRecords(response) {
    // Get completed & missed count from task_status
    const completed = response.completed;
    const missed = response.missed;

       return `
        <div id="${response.task_id}" class="parentCard w-full h-[200px] bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 mb-4 p-4">
            <div class="flex h-full items-center justify-between">
                <!-- Left: Task Title -->
                <div class="text-xl font-semibold text-gray-800">
                    ${response.title}
                </div>

                <!-- Right: Status Section -->
                <div class="flex flex-col items-end gap-2 text-sm">
                    <div class="flex items-center gap-2">
                        <div style="width: 10px; height: 10px; border-radius: 50%; background-color: #22c55e;"></div>
                        <span class="text-gray-700">Completed: ${completed}x</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div style="width: 10px; height: 10px; border-radius: 50%; background-color: #ef4444;"></div>
                        <span class="text-gray-700">Missed: ${missed}x</span>
                    </div>
                </div>
            </div>
        </div>
    `;
}

function add_complete(id){

}

