const token = localStorage.getItem("token");

$(document).ready(function () {
    console.log("main");
    const indexTask = new Request("/api", "/task", token);
    indexTask.getAll(
        function (data) {
            console.log("success");
            sectionCard(data);
        },
        () => console.log("couldnt fetch the data from the database!")
    );

    $("#createTaskbtn").on("click", function (e) {
        e.preventDefault();
        console.log("sdadad");
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
});
