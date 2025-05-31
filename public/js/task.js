const token=localStorage.getItem("token")
function modalReset(){
    $("#taskCreate").hide().trigger('reset');
    
}

$(document).ready(function () {
    console.log("ready")
    $("#taskModal").on("submit",function(e){
        e.preventDefault()
        console.log("sdadad")
        const formData= new FormData($("#taskForm")[0])
        for(let pair of formData.entries()){
            console.log(`${pair[0]}=>${pair[1]}`)
        }
        console.log(token)
        $.ajax({
            type: "POST",
            url: "/api/task",
            data: formData,
            dataType: "json",
            headers:{
                "Cached-Control":"no-cached",
                "Authorization" :"Bearer " + token
            },
            processData:false,
            contentType:false,
            success: function (response) {
                modalReset()
                console.log(response)
            },
            error:function (response){
                console.log(response);
            }
        });
    })
});