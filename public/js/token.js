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

    $("#logOutForm").on("submit",function(e){
        e.preventDefault()
        console.log('asdasdas')
        $.ajax({
            method:"POST",
            dataType:"json",
            url:"/logout",
             headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){
                const token =localStorage.removeItem("token")
                window.location.href=$data.redirect
            }
        })
    })
});