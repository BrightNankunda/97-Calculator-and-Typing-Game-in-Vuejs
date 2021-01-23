let getters = {
    posts: state => {
        return state.posts
    },
    lasts: state => {
        return state.lasts
    },
    user: state => {
        return state.user
    },
    bytesUntilLevelUp: state => {
        return Math.round(state.player.nextLevel - state.totalBytes)
    },
    availableUpgrades: state => {
        return state.upgrades.filter(upgrade => {
            if(upgrade.unlocksAt <= state.player.level) {
                upgrade.disabled = false;
                return upgrade;
            } else if(upgrade.unlocksAt - 1 === state.player.level) {
                upgrade.disabled = true;
                return upgrade;
            }
        })
    },
     remaining(state) {
            return state.todos.filter(todo => !todo.completed).length
        },
        anyRemaining(state, getters) {
            return getters.remaining != 0
        },
        todosFiltered(state) {
            if (state.filter == "all") {
                return state.todos
            } else if (state.filter == "active") {
                return state.todos.filter(todo => !todo.completed)
            } else if (state.filter == "completed") {
                return state.todos.filter(todo => todo.completed)
            }
        },
        showClearCompletedButton(state) {
            return state.todos.filter(todo => todo.completed).length > 0
        }

}

export default getters