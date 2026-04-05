<script setup lang="ts">
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Column } from '@/types/columns'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import TableList from '@/components/TableList.vue'

    const gamesStore = useGamesStore()
    const { isLoading, error, games } = storeToRefs(gamesStore)
    const { fetchGames, removeGame } = gamesStore

    fetchGames()

    const cols: Column[] = [
        { label: 'ID', key: 'id' },
        { label: 'Title', key: 'title' },
        { label: 'Publisher', key: 'publisher_id' },
        { label: 'Release', key: 'release' },
    ]

    const handleDelete = (id: number) => {
        removeGame(id)
    }
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
    </AlertMessage>

    <TableList 
        @delete="handleDelete"
        :has-detail-action="true"
        :has-edit-action="true"
        :has-delete-action="true"
        :cols="cols" 
        :items="games" 
    />
</template>