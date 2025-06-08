class system extends Request{
    taskUpdate (success,error){
        $.ajax({
            method:"GET",
            url:"api/task/sys_update",
            header:super.headers(),
            dataType:"json",
            processData:false,
            contentType:false,
            success,
            error
        })
    }
}