import { RouteRecordRaw } from 'vue-router'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [{ path: '', component: () => import('pages/Index.vue') },
      { path: 'posts/create', component: () => import('pages/posts/Create.vue') },
      { path: 'posts/:id', component: () => import('pages/posts/_id/Show.vue') },
      { path: 'posts/:id/edit', component: () => import('pages/posts/_id/Edit.vue') },
      { path: 'posts/', component: () => import('pages/posts/Index.vue') }]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
