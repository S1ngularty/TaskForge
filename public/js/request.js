class Request {
    constructor(baseURL, resource, token) {
        this.baseURL = baseURL;
        this.resource = resource;
        this.token = token;
    }

    __getHeaders() {
        return {
            "Cache-Control": "no-cache",
            Authorization: "Bearer " + this.token,
        };
    }

    _debug() {
        console.log(`${this.baseURL},${this.resource},${this.token}`);
    }

    getAll(success, error) {
        $.ajax({
            method: "GET",
            url: `${this.baseURL}/${this.resource}`,
            headers: this.__getHeaders(),
            dataType: "json",
            success,
            error,
        });
    }

    getById(Id, success, error) {
        $.ajax({
            method: "GET",
            url: `${this.baseURL}/${this.resource}/${Id}`,
            headers: this.__getHeaders(),
            dataType: "json",
            success,
            error,
        });
    }

    create(data, success, error) {
        $.ajax({
            method: "POST",
            url: `${this.baseURL}/${this.resource}`,
            data:data,
            processData:false,
            contentType:false,
            headers: this.__getHeaders(),
            dataType: "json",
            success,
            error,
        });
    }

    update(Id, data, success, error) {
        $.ajax({ 
            method: "POST",
            url: `${this.baseURL}/${this.resource}/${Id}`,
            headers: this.__getHeaders(),
            data:data,
            processData:false,
            contentType:false,
            dataType: "json",
            success,
            error,
        });
    }

    delete(Id, success, error) {
        $.ajax({
            method: "DELETE",
            url: `${this.baseURL}/${this.resource}/${Id}`,
            headers: this.__getHeaders(),
            dataType: "json",
            success,
            error,
        });
    }
}
