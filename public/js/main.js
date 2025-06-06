const token = localStorage.getItem("token");

$(document).ready(function () {
    console.log("main");
    const indexTask = new Request("/api", "/task", token);
    indexTask.getAll(
        function (data) {
            const section = $("#task-section");
            data.forEach((data) => {
                section.append(sectionCard(data));
            });
        },
        () => console.log("couldnt fetch the data from the database!")
    );

    $("#createTaskbtn").click(function (e) {
        e.preventDefault();
        const formData = new FormData($("#taskForm")[0]);
        formData.append("_method", "PUT");
        for (let pair of formData.entries()) {
            console.log(`${pair[0]}=>${pair[1]}`);
        }
        const task = new Request("/api", "task", token);
        if ($("#createTaskbtn").data("action") == "create") {
            task.create(
                formData,
                () => {
                    modalReset();
                    console.log("success");
                },
                () =>
                    console.log("failed to create the task, please try again!")
            );
        } else {
            const id = document
                .querySelector("#taskForm #task_id")
                .getAttribute("value");
            console.log(id);
            task.update(
                id,
                formData,
                function (response) {
                    modalReset();
                    console.log(response);
                    $("#task-section").prepend(sectionCard(response));
                },
                () =>
                    console.log("failed to update the task, please try again!")
            );
        }
    });

    $(document)
        .off("click")
        .on("click", "#taskUpdate", function (e) {
            e.preventDefault();
            console.log("clicked");
            const infoShow = new Request("/api", "task", token);
            const id = $(event.target).closest("button").data("id");
            console.log(id);
            infoShow.getById(
                id,
                function (response) {
                    console.log("success", response);
                    const modal = document.getElementById("taskModal");
                    modal.querySelector("#taskForm").appendChild(idField(id));
                    modal.classList.remove("hidden");
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
                    modal.querySelector("#description").textContent =
                        response.description;
                },
                (response) =>
                    console.log(
                        "failed to retrieve the task information, please try again later!",
                        response
                    )
            );
        });

    $(document).on("click", "#taskDelete", function (e) {
        e.preventDefault();
        const id = $(e.target).closest("button").data("id");
        // console.log(id)
        const taskDelete = new Request("/api", "task", token);
        taskDelete.delete(
            id,
            function (response) {
                console.log(response);
                const target = $(e.target).closest(".parentCard");
                // console.log(target)
                target.fadeOut("slow", function () {
                    target.remove();
                });
            },
            (response) => console.error(response)
        );
    });
});
