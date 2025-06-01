$(document).ready(function () {
    console.log("main");
    $.ajax({
        method: "GET",
        url: "/api/task",
        dataType: "json",
        headers: {
            "Cache-Control": "no-cache",
            Authorization: "Bearer " + token,
        },
        success: function (response) {
            console.log(response);
            const section = $("#task-section");
            response.forEach((task) => {
                console.log("1")
                section.append(
                    `<div class="w-full h-[200px] bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 mb-4">
                    <div class="flex items-center justify-evenly gap-10 p-4">
                        <div class="flex items-center justify-center">
                            <input type="checkbox" data-id="${task.task_id}" class="w-8 h-8 rounded-md border-gray-300 accent-blue-600 transition-all duration-200 ease-in-out checked:scale-110 hover:scale-105 cursor-pointer border-2" />
                        </div>
                        <div class="flex flex-col">
                            <h5 class="text-lg font-semibold text-gray-800">${
                                task.title
                            }</h5>
                            <p class="text-green-600 font-semibold text-xl mt-1">${
                                task.occurence ?? "N/A"
                            }</p>
                            <p class="text-gray-500 mt-2 text-sm">${
                                task.description ?? "No description available"
                            }</p>
                        </div>
                    </div>
                </div>`
                );
            });
        },
        error: function (response) {
            console.log(response);
        },
    });
});
