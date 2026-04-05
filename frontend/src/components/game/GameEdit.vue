<script setup lang="ts">
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Game } from '@/types/game'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import GameForm from '@/components/game/GameForm.vue'

    const gamesStore = useGamesStore()
    const { isLoading, error, game } = storeToRefs(gamesStore)
    const { fetchGame, updateGame } = gamesStore

    const { id } = defineProps<{
        id: string | string[] | undefined
    }>()

    fetchGame(id)

    const handleSubmit = (game: Game) => {
        updateGame(id, game)
    }
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
    </AlertMessage>

    <GameForm 
        v-if="game"
        @submit="handleSubmit"
        :init-values="{
            title: game.title,
            platform_id: game.platform_id,
            is_physical: game.is_physical ? true : false,
            is_digital: game.is_digital ? true : false,
            genre_id: game.genre_id,
            publisher_id: game.publisher_id,
            release: game.release,
        }"
    />
</template>