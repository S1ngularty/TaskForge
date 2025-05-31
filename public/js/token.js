$(document).ready(function () {
    $("form").on("submit",function (e) {
        e.preventDefault()
        const formData=new FormData($("form")[0])
        $.ajax({
            method:"POST",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            url:"/login",
            success: function (data){
                localStorage.setItem('token',data.token)
                window.location.href=data.redirect
            },
            else:function(){
                console.log("failed to login")
            }
        })
      })
});