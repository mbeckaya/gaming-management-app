<script setup lang="ts">
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Column } from '@/types/columns'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import ItemList from '@/components/ItemList.vue'

    const gamesStore = useGamesStore()
    const { isLoading, error, game } = storeToRefs(gamesStore)
    const { fetchGame } = gamesStore

    const { id } = defineProps<{
        id: string | string[] | undefined
    }>()

    fetchGame(id)

    const cols: Column[] = [
        { label: 'ID', key: 'id' },
        { label: 'Title', key: 'title' },
        { label: 'Platform', key: 'platform_id' },
        { label: 'Physical', key: 'is_physical' },
        { label: 'Digital', key: 'is_digital' },
        { label: 'Genre', key: 'genre_id' },
        { label: 'Publisher', key: 'publisher_id' },
        { label: 'Release', key: 'release' },
    ]
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
    </AlertMessage>

    <ItemList :cols="cols" :item="game" />
</template>