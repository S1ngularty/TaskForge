class task extends Request {
    taskDone(id, success, error) {
        const data = new FormData();
        data.append("task_id", id);
        data.append("_method", "PUT");
        super.update(id, data, success, error);
    }

   
}
