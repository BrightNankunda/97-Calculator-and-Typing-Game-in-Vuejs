let actions = {

    createPost({commit}, post) {
        axios.post('/api/posts', post)
            .then(res => {
                commit('CREATE_POST', res.data)
            }).catch(err => {
                console.log(err)
        })
    },
    addAGadget({commit}, data) {
        axios.post('/api/gadget', {company: data.company, type: data.type}).then(res => {

            console.log(res.data);
            commit('addAGadget', res.data)
        }).catch(err => {
            console.log(err.response)
        })
        
    },
    getGadgets(context) {
        return new Promise((resolve, reject) => {

            axios.get('/api/gadget').then(res => {
                context.commit('gadgets', res.data)
                resolve(res)
            }) 
            .catch(err => {
                console.log(err.respponse)
                reject(err)
            })
        })
    },
    deleteGadget({commit}, id) {
        axios.delete('/api/gadget/' + id).then(res => {
            commit('deleteGadget', id)
        }).catch(err => {
            console.log(err.response)
        })
    },
    forceDeleteGadget({commit}, id) {
        axios.delete('/api/gadgetForceDelete/' + id).then(res => {
            commit('forceDeleteGadget', id)
        })
        .catch(err => {
            console.log(err.response)
        })
    },
    fetchDeleted({commit}) {
        axios.get('/api/gadgetGetTrashed').then(res => {
            commit('AddDeleted', res.data)
        }).catch(err => {
            console.log(err.response);
        })
    },
    restoreAllDeleted({commit}) {
        axios.post('/api/gadgetRestoreAll').then(res => {
            commit('restoreAllDeleted', res.data)
        }).catch(err => {
            console.log(err.response);
        })
    },
    restoreDeleted({commit}, id) {
        axios.post('/api/gadgetRestore' + id).then(res => {
            console.log(res.data);
        }).catch(err => {
            console.log(err.response);
        })
    },
    user({commit}) {
        axios.get('/api/profile')
        .then(response => {
            console.log(response.data.email)
            commit('user', response.data)
        })
        .catch(err => {
            console.log(err)
        })
    },
    fetchPosts({commit}, {post}) {
        axios.get('/api/posts', post)
            .then(res => {
                console.log(res)
                commit('FETCH_POSTS', res.data)
            }).catch(err => {
                console.log(err)
        })
    },
    post(id) {

        axios.get(`/api/show/${id}`)
        .then(response => {

            console.log(response)
        })
        .catch(err => {
            console.log(err)
        })
    },
    fetchLasts({commit}) {
        axios.get('/api/lasts')
        .then(response => {
            console.log(response.data)
            commit('fetchLasts', response.data)
        })
        .catch(err => {
            console.log(err)
        })
    },
    deleteLast({commit}, last) {
        axios.delete(`/api/lasts/${last.id}`)
        .then(response => {
            if(response.data === 'ok') {
                commit('deleteLast', last)
            } else (
                console.log('Failed to delete')
            )
        })
        .catch(err => {
            console.log(err)
        })
    },
    deletePost({commit}, post) {
        axios.delete(`/api/posts/${post.id}`)
            .then(res => {
                if (res.data === 'ok')
                commit('DELETE_POST', post)
            }).catch(err => {
                console.log(err)
            })
    },
    retrieveTodos(context) {
        axios.get('api/index')
        .then(response => {
            context.commit('retrieveTodos', response.data)   
        })
        .catch(err => {
            connsole.log(err)
        })
    },
    addTodo(context, todo) {
        context.commit('addTodo', todo)
    },
    clearCompleted(context) {
        axios.get('api/index') 
        .then(response => {
            console.log(response.data)
        })
        .catch(err => {
            console.log(err)
        })
        context.commit('clearCompleted')
    },
    updateFilter(context, filter) {
         context.commit('updateFilter',filter)
    },
    checkAll(context, checked) {
        context.commit('checkAll', checked)
    },
    deleteTodo(context, id) {
        context.commit('deleteTodo', id)
    },
    updateTodo(context, todo) {
        context.commit('updateTodo', id)
    }
}

export default actions