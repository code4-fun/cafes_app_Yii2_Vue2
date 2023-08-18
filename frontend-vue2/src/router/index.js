import Vue from 'vue'
import Router from 'vue-router'
import Layout from '../components/Layout'
import About from '../views/About'
import Cafes from "../views/Cafes";

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    {path: '/', name: 'layout', component: Layout, redirect: {name: 'cafes'},
      children: [
        {path: 'cafes', name: 'cafes', component: Cafes},
        {path: 'about', name: 'about', component: About},
      ]
    },
    {path : '*', redirect : '/home'}
  ]
})

export default router
