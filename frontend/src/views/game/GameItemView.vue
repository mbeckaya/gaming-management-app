<script setup lang="ts">
    import { useRoute } from 'vue-router'
    import DefaultTemplate from '@/components/DefaultTemplate.vue'
    import GameItem from '@/components/game/GameItem.vue'

    const route = useRoute()
    const id = route.params.id
</script>


<template>
    <DefaultTemplate>
        <template #headline>
            Show a game
        </template>

         <GameItem :id="id" />
    </DefaultTemplate>
</template>