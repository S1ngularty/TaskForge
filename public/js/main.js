const token = localStorage.getItem("token");

$(document).ready(function () {
    console.log("main");
    const indexTask = new Request("/api", "/task", token);
    indexTask.getAll(
        function (data) {
            sectionCard(data);
        },
        () => console.log("couldnt fetch the data from the database!")
    );

    $("#createTaskbtn").on("click", function (e) {
        e.preventDefault();
        const formData = new FormData($("#taskForm")[0]);
        for (let pair of formData.entries()) {
            console.log(`${pair[0]}=>${pair[1]}`);
        }
        console.log(token);
        const create = new Request("/api", "task", token);
        create.create(
            formData,
            () => {
                modalReset();
                console.log("success");
            },
            () => console.log("failed to create the task, please try again!")
        );
    });

    $("#task-section").on("click", "#taskUpdate, #taskDelete", function (e) {
        console.log("clicked");
        const infoShow = new Request("/api", "task", token);
        const id = $(event.target).closest("button").data("id")
        console.log(id);
        infoShow.getById(
            id,
            function (response) {
                console.log("success", response);
                const modal = document.getElementById("taskModal");
                modal.classList.remove("hidden");
                modal.querySelector(".title").textContent = "Update your task";
                modal
                    .querySelector("#title")
                    .setAttribute("value", `${response.title}`);
                modal
                    .querySelector("#occurence")
                    .querySelector(
                        `option[value=${response.occurence}]`
                    ).selected = true;
                modal.querySelector("#description").textContent=`${response.description}`
            },
            (response) =>
                console.log(
                    "failed to retrieve the task information, please try again later!",
                    response
                )
        );
    });
});
