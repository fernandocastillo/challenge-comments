
export const store = {
    state: {
        paginator: {},
        comments: [],
        loading: false,
    },
    setErrors(errors){
        this.state.errors = errors
    },
    setPaginator(response) {
        this.state.paginator = response.data;
        this.state.comments = response.data.data;
    },
    getResults: (page = 1) => {
        const _this = this.a;
        axios.get('comment?page=' + page)
            .then(response => {
                _this.setPaginator(response)
            });
    },
    postComment: (payload, successCallback, errorCallback) => {
        const _this = this.a;
        _this.startHttpRequest()
        axios.post('comment', payload)
            .then(() => {
                if(successCallback) successCallback()
                _this.getResults(1)
            })
            .catch( error => {
                if(errorCallback) errorCallback(error)
            })
            .finally(()=>{
                _this.endHttpRequest()
            })
        ;
    },
    startHttpRequest: function(){
        this.state.loading=true
        this.state.errors={}
    },
    endHttpRequest: function(){
        this.state.loading=false
    },
};
