import request from 'superagent';

class HTTPClient {
    proxy = process.env.REACT_APP_API_ENDPOINT;

    async get(path) {
        console.log('called2', this._getUrl(path))
        const response = await request.get(this._getUrl(path));
        return response.body;
    }

    async post(path, body) {
        const response = await request.post(this._getUrl(path)).send(body);
        return response.body;
    }

    async put(path, body) {
        const response = await request.put(this._getUrl(path)).send(body);
        return response.body;
    }

    async delete(path, body) {
        const response = await request.delete(this._getUrl(path));
        return response.data;
    }

    _getUrl(path) {
        return this.proxy + path;
    }
}

export default new HTTPClient();
