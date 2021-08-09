
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
        axios.get('comment?page=' + page)
            .then(response => {
                this.a.setPaginator(response)
            });
    },
    startHttpRequest: function(){
        this.state.loading=true
        this.state.errors={}
    },
    endHttpRequest: function(){
        this.state.loading=false
    },
};
