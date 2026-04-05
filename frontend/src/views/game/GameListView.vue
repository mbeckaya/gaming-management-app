<script setup lang="ts">
    import DefaultTemplate from '@/components/DefaultTemplate.vue'
    import GameList from '@/components/game/GameList.vue'
</script>

<template>
    <DefaultTemplate>
        <template #headline>
            All games
        </template>

        <GameList />
    </DefaultTemplate>
</template>