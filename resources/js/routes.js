import Home from './components/Home.vue';
import About from './components/About.vue';
import Posts from './components/Posts.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import CreatePost from './components/CreatePost.vue';
import Image from './components/Image.vue';
import Kampala from './components/Kampala.vue';
import Todo from './components/Todo.vue';
import Last from './components/Last.vue';
import Less from './components/Less.vue'
import user from './components/user.vue';
import details from './components/details.vue';
import Dashboard from './components/Dashboard.vue';
import Kira from './components/Kira.vue';
import Kawempe from './components/Kawempe.vue';
import Phones from './components/Phones.vue';
import Bphones from './components/Bphones.vue';
import Post from './components/Post.vue';
import Typing from './components/Typing.vue';
import Calculator from './components/Calculator.vue';
import SoftDeletes from './components/SoftDeletes';

export default {
    // mode: 'history',

    routes: [
        {
            path: '/',
            component: Home

        },
        {
            path: '/deletes',
            component: SoftDeletes
        },
        {
            path: '/kampala',
            component: Kampala,
            children: [
                {
                    path: 'kira',
                    component: Kira
                },
                {
                    path: 'kawempe',
                    component: Kawempe
                }
            ]
        },
        {
            path: '/phones',
            component: Phones

        },
        {
            path: '/phones/:id',
            component: Bphones,
            name: Bphones
        },

        {
            path: '/dashboard',
            component: Dashboard
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/calculator',
            component: Calculator
        },
        {
            path: '/last',
            component: Last
        }, 
        {
            path: '/details',
            component: details
        },
        {
            path: '/less',
            component: Less
        },
        {
            path: '/typing',
            component: Typing
        },
        {
            path: '/posts',
            component: Posts
        },
        {
            path: '/posts/:id',
            component: Post
        },
        {
            path: '/todo',
            component: Todo

        },
        {
            path: '/login',
            component: Login
        },
        {
            path: '/register',
            component: Register
        }, 
        {
            path:'/createpost',
            component: CreatePost
        },
        {
            path:'/image',
            component: Image
        },
        {
            path:'/kampala',
            component: Kampala
        },
        {
            path: '/user',
            component: user
        }
        
    ]
     
}