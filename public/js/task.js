const token = localStorage.getItem("token");
function modalReset() {
    $("#taskCreate").hide().trigger("reset");
}

$(document).ready(function () {
    console.log("ready");
    $("#createTaskbtn").on("click", function (e) {
        e.preventDefault();
        console.log("sdadad");
        const formData = new FormData($("#taskForm")[0]);
        for (let pair of formData.entries()) {
            console.log(`${pair[0]}=>${pair[1]}`);
        }
        console.log(token);
        $.ajax({
            type: "POST",
            url: "/api/task",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            headers: {
                "Cache-Control": "no-cached",
                Authorization: "Bearer " + token,
            },
            success: function (response) {
                modalReset();
                console.log(response);
            },
            error: function (response) {
                console.log(response);
            },
        });
    });
});
