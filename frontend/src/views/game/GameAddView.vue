<script setup lang="ts">
    import DefaultTemplate from '@/components/DefaultTemplate.vue'
    import GameAdd from '@/components/game/GameAdd.vue'
</script>

<template>
    <DefaultTemplate>
        <template #headline>
            Create a new game
        </template>

         <GameAdd />
    </DefaultTemplate>
</template>