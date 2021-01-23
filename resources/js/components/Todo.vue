<template>
<div class="container mx-auto">
    <div class="row">
        <h3 class="lead" title="Bright on the move">Nankunda Todos</h3>
    </div>

    <div class="row">
        <input type="text" class="todo-input" v-model="newTodo" placeholder="Add project todos" @keyup.enter="addTodo">
    </div>

    <div class="row p-1 todo-item" v-for="(todo, index) in todosFiltered" :key="todo.id">

        <div class="todo-item-left">
            <input type="checkbox" v-model="todo.completed">
            <div class="todo-item-label" v-if="!todo.editing" :class="{ completed: todo.completed }" @dblclick="editTodo(todo)">{{todo.title}}</div>
            <input type="text" v-else class="todo-item-edit" v-model="todo.title" @blur="doneEdit(todo)" @keyup.enter="doneEdit(todo)" @keyup.esc="cancelEdit(todo)" v-focus>
        </div>

        <div class="remove-item" @click="removeTodo(index)">
            &times;
        </div>

    </div>
    <div class="extra-container">
        <div><label><input type="checkbox" @change="checkAllTodos">Check All</label></div>
    </div>

</div>
</template>

<script>
export default {
    name: 'Todo',
    data() {
        return {
            newTodo: '',
            idForTodo: 4,
            beforeEditCache: '',
        }
    },
    created() {
        this.$store.dispatch('retrieveTodos')
    },
    computed: {
        todosFiltered() {
            return this.$store.getters.todosFiltered
        },
        showClearCompletedButton() {
            return this.$store.getters.showClearCompletedButton
        },

    },
    directives: {
        focus: {
            inserted: function (el) {
                el.focus()
            }
        }
    },
    methods: {
        addTodo() {
            const len = this.newTodo.split(' ').length
            if (len < 2) {
                return
            }
            if (this.newTodo.trim().length == 0) {
                return
            }
            this.$store.dispatch('addTodo', {
                id: this.idForTodo,
                title: this.newTodo,
            })

            // this.$store.state.todos.push({
            //     id: this.idForTodo,
            //     title: this.newTodo,
            //     completed: false
            // })
            this.newTodo = '',
                this.idForTodo++
        },
        removeTodo(id) {
            this.$store.dispatch('deleteTodo', id)
        },
        editTodo(todo) {
            this.beforeEditCache = todo.title
            todo.editing = true
        },
        doneEdit(todo) {
            if (todo.title.trim() == '') {
                todo.title = this.beforeEditCache
            }
            todo.editing = false

            this.$store.dispatch('updateTodo', {
                'id': this.id,
                'title': this.title,
                'completed': this.completed,
                'editing': this.editing
            })
        },
        cancelEdit(todo) {
            todo.title = this.beforeEditCache
            todo.editing = false
        },
        checkAllTodos() {
            this.$store.dispatch('checkAll', event.target.checked)
        }
    }
}
</script>

<style scoped>
.container {
    max-width: 600px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    font-size: 24px;
}

.todo-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.remove-item {
    cursor: pointer;
}

.remove-item:hover {
    color: red;
}

.todo-item-left {
    display: flex;
    align-items: center;
}

.todo-item-label {
    padding: 10px;
    border: 1px solid white;
    margin-left: 12px;
}

.todo-item-edit {
    width: 100%;
    margin-left: 12px;
    border: 1px solid #ccc !important;
}

.completed {
    text-decoration: line-through;
    color: red;
}

.extra-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    border-top: 1px solid light-grey;
    padding-top: 14px;
    margin-bottom: 14px;
}

button {
    border: 1px solid black;
    background: honeydew;
    padding: 2px;
    color: green
}

.active {
    color: green;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity .2s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
