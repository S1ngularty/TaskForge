class task extends Request {

    taskDone(id, success, error) {
        const data = new FormData();
        data.append("task_id", id);
        data.append("update", false);
        super.update(id, data, success, error);
    }
}
