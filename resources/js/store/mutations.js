import state from "./state"

let mutations = {
    CREATE_POST(state, post) {
        state.posts.unshift(post)
    },
    FETCH_POSTS(state, posts) {
        return state.posts = posts
    },
    DELETE_POST(state, post) {
        let index = state.posts.findIndex(item => item.id === post.id)
        state.posts.splice(index, 1)
    },
    deleteLast(state, last) {
        let index = state.lasts.findIndex(item => item.id === last.id)
        state.lasts.splice(index, 1)
    },
    fetchLasts(state, lasts) {
        state.lasts = lasts
    },
    user(state, user) {
        state.user = user
    },
    addTodo(state, todo) {
        state.todos.push({
            id: todo.id,
            title: todo.title,
            completed: false,
            editing: false
        })
    },
    clearCompleted(state) {
        state.todos = state.todos.filter(todo => !todo.completed)
    },
    checkAll(state, checked) {
        state.todos.forEach(todo => (todo.completed = event.target.checked))
    },
    deleteTodo(state, id) {
        const index = state.todos.findIndex(item => item.id == id)
        state.todos.splice(index, 1)
    },
    updateTodo(state, todo) {
        const index = state.todos.findIndex(item => item.id == todo.id)
        state.todos.splice(index, 1, {
            'id': todo.id,
            'title': todo.title,
            'completed': todo.completed,
            'editing': todo.editing
        })
    },
    incrementBytes(state, increment) {
        state.bytes += increment
        state.totalBytes += increment
    },
    levelUp(state) {
        state.player.level++
        state.player.nextLevel *= state.player.increase
    },
    gadgets(state, data) {
        state.gadgets = data
    },
    addAGadget(state, data) {
        state.gadgets.unshift(data)
    },
    deleteGadget(state, id) {
        let index = state.gadgets.findIndex(gadget => gadget.id === id)
        state.gadgets.splice(index, 1)
    },
    AddDeleted(state, data) {
        // state.deletedGadgets = [...data]
        state.deletedGadgets = data
    },
    restoreAllDeleted(state, data) {
        state.gadgets.unshift(data)
        // state.gedgets = [...state.gadgets, data]
        state.deletedGadgets.splice(0)
    },
    forceDeleteGadget(state, id) {
        let index = state.gadgets.findIndex(gadget => gadget.id === id)
        state.gadgets.splice(index, 1)
    },
    buyUpgrade(state, {index, amount}) {
        if(state.bytes >= state.upgrades[index].cost ) {
            state.bytes -= state.upgrades[index].cost
            state.upgrades[index].quantity += amount
            state.upgrades[index].cost = Math.round(state.upgrades[index].cost * state.upgrades[index].increase)
        } else {
            alert('You Need More');
        }
    },
    bytesperSecond(state) {
        state.bps = 0;
        state.upgrades.forEach(upgrade => {
            state.bps += (upgrade.bps * upgrade.quantity)
            state.bytes += (upgrade.bps * upgrade.quantity)/60;
            state.totalBytes += (upgrade.bps * upgrade.quantity)/60;
        })
    },
    retrieveTodos(state, todos) {
        state.todos = todos
    },
}

export default mutations