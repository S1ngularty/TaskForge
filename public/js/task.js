class task extends Request {
    taskDone(id, success, error) {
     const data= new FormData()
      data.append("id",id)
      
        super.update(id, data, success, error);
    }
}
