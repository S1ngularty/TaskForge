const token = localStorage.getItem("token");

$(document).ready(function () {
    // retrieve task data
    const indexTask = new Request("/api", "task", token);
    indexTask.getAll(
        function (data) {
            
            const section = $("#task-section");
            data.forEach((data) => {
                data.ts_id=data.task_status[0].ts_id;
                console.log(data);
                section.append(sectionCard(data));
            });
        },
        () => console.log("couldnt fetch the data from the database!")
    );

    // update function
    $(document)
        .off("click")
        .on("click", "#taskUpdate", function (e) {
            e.preventDefault();
            console.log("clicked");
            const infoShow = new Request("/api", "task", token);
            const id = $(e.target).closest("button").data("id");
            infoShow.getById(
                id,
                function (response) {
                    console.log("success", response);
                    const modal = document.getElementById("taskModal");
                    modal.classList.remove("hidden");
                    modal.querySelector("#task_id").value = id;
                    modal.querySelector("#createTaskbtn").dataset.action =
                        "update";
                    modal.querySelector(".title").textContent =
                        "Update your task";
                    modal.querySelector("#title").value = response.title;
                    modal
                        .querySelector("#occurence")
                        .querySelector(
                            `option[value=${response.occurence}]`
                        ).selected = true;
                    modal.querySelector("#description").value =
                        response.description;
                },
                (response) =>
                    console.log(
                        "failed to retrieve the task information, please try again later!",
                        response
                    )
            );
        });

    // mark as completed
    $(document)
        .off("change")
        .on("change", "#completeTask", function (e) {
            e.preventDefault();
            const target = $(e.target).data("id");
            console.log(target);
            const request = new task("/api", "task/taskDone", token);
            request.taskDone(
                target,
                function (response) {
                    console.log(response);
                    taskDoneAnimation($(e.target).closest(".parentCard"));
                },
                (response) =>
                    console.error(
                        "failed to mark as completed your task, please try again"
                    )
            );
        });

    // delete function
    $(document).on("click", "#taskDelete", function (e) {
        e.preventDefault();
        const id = $(e.target).closest("button").data("id");
        const taskDelete = new Request("/api", "task", token);
        taskDelete.delete(
            id,
            function (response) {
                console.log(response);
                const target = $(e.target).closest(".parentCard");
                console.log(target);
                // console.log(target)
                removeCard(target);
            },
            (response) => console.error(response)
        );
    });

    // modal submit button
    $("#createTaskbtn").click(function (e) {
        e.preventDefault();
        const formData = new FormData($("#taskForm")[0]);
        for (let pair of formData.entries()) {
            console.log(`${pair[0]}=>${pair[1]}`);
        }
        const task = new Request("/api", "task", token);
        if ($("#createTaskbtn").data("action") == "create") {
            task.create(
                formData,
                function (response) {
                    modalReset();
                    response.data.ts_id=response.stage.ts_id;
                    console.log(response);
                    $("#task-section").prepend(sectionCard(response.data));
                },
                () =>
                    console.error(
                        "failed to create the task, please try again!"
                    )
            );
        } else {
            const id = document
                .querySelector("#taskForm #task_id")
                .getAttribute("value");
            formData.append("update", true);
            formData.append("_method", "PUT");
            task.update(
                id,
                formData,
                function (response) {
                    modalReset();
                    console.log(response);
                    removeCard($("#task-section").find(`#${id}`));
                    $("#task-section").prepend(sectionCard(response));
                },
                () =>
                    console.log("failed to update the task, please try again!")
            );
        }
    });

    const completedTask = new task("/api", "task/task_records",token);
    completedTask.getAll(function (response) {
        // console.log(response);
        const section = $("#task-completed");
        response.forEach((data) => {
            section.append(taskRecords(data));
        }),
            () =>
                console.error(
                    "failed to fetch the completed task, please try again"
                );
    });

    fetch("http://192.168.1.11:4000/api/v1/item")
    .then(response=>response.json())
    .then(data=> console.log(data))
    .catch(error=>console.log(error))
});
