<script setup lang="ts">
    import { useRoute } from 'vue-router'
    import DefaultTemplate from '@/components/DefaultTemplate.vue'
    import GameEdit from '@/components/game/GameEdit.vue'

    const route = useRoute()
    const id = route.params.id
</script>

<template>
    <DefaultTemplate>
        <template #headline>
            Edit a game
        </template>

         <GameEdit :id="id" />
    </DefaultTemplate>
</template>