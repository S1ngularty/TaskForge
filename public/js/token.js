$(document).ready(function () {
    $("#login").on("click",function (e) {
        e.preventDefault()
        const formData=new FormData($("#loginForm")[0])
        console.log("clicked")
        $.ajax({
            method:"POST",
            data:formData,
            processData:false,
            contentType:false,
            dataType:"json",
            url:"/login",
            headers:{
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data){
                console.log(data)
                localStorage.setItem('token',data.token)
                window.location.href=data.redirect
            },
            else:function(){
                console.log("failed to login")
            }
        })
      })

});