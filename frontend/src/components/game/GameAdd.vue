<script setup lang="ts">
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Game } from '@/types/game'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import GameForm from '@/components/game/GameForm.vue'

    const gamesStore = useGamesStore()
    const { isLoading, error } = storeToRefs(gamesStore)
    const { addGame } = gamesStore
      
    const handleSubmit = (game: Game) => {
        addGame(game)
    }
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
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