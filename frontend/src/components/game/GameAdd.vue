<script setup lang="ts">
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Game } from '@/types/game'
    import { ANIMATION_DURATION_ALERT } from '@/utils/constants'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import GameForm from '@/components/game/GameForm.vue'

    const router = useRouter()

    const isSaved = ref(false)
    const gamesStore = useGamesStore()
    const { isLoading, error } = storeToRefs(gamesStore)
    const { addGame } = gamesStore
      
    const handleSubmit = async (game: Game) => {
        await addGame(game)

        isSaved.value = true

        setTimeout(() => {
            router.push({ name: 'games.list' })
        }, ANIMATION_DURATION_ALERT);
    }
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
    </AlertMessage>

     <AlertMessage v-if="isSaved" type="success" >
        Game was successful created
    </AlertMessage>

    <GameForm 
        @submit="handleSubmit"
        :init-values="{
            title: '',
            platform_id: 0,
            is_physical: false,
            is_digital: false,
            genre_id: 0,
            publisher_id: 0,
            release: 2026,
        }" 
    />
</template>