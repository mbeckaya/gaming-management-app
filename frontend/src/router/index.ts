import { createRouter, createWebHistory } from 'vue-router'
import GameAddView from '@/views/game/GameAddView.vue'
import GameItemView from '@/views/game/GameItemView.vue'
import GameEditView from '@/views/game/GameEditView.vue'
import GameListView from '@/views/game/GameListView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: { name: 'games.list' }
    },
    {
      path: '/games',
      name: 'games.list',
      component: GameListView,
    },
    {
      path: '/games/new',
      name: 'games.add',
      component: GameAddView,
    },
    {
      path: '/games/:id',
      name: 'games.item',
      component: GameItemView,
    },
    {
      path: '/games/:id/edit',
      name: 'games.edit',
      component: GameEditView,
    },
  ],
})

export default router
