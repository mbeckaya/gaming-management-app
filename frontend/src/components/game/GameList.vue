<script setup lang="ts">
    import { ref } from 'vue'
    import { useGamesStore } from '@/stores/games'
    import { storeToRefs } from 'pinia'
    import type { Column } from '@/types/columns'
    import { ANIMATION_DURATION_ALERT } from '@/utils/constants'
    import LoadingState from '@/components/LoadingState.vue'
    import AlertMessage from '@/components/AlertMessage.vue'
    import TableList from '@/components/TableList.vue'

    const isDeleted = ref(false)
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

    const handleDelete = async (id: number) => {
        await removeGame(id)

        isDeleted.value = true

        setTimeout(() => {
            isDeleted.value = false
        }, ANIMATION_DURATION_ALERT);
    }
</script>

<template>
    <LoadingState v-if="isLoading" />

    <AlertMessage v-if="error" type="error" >
        {{ error }}
    </AlertMessage>

    <AlertMessage v-if="isDeleted" type="success" >
         Game was successful deleted
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