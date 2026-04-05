<script setup lang="ts">
    const { type } = defineProps<{
        type: 'error' | 'success'
    }>()
</script>

<template>
    <p :class="`alert-${type}`">
        <slot />
    </p>
</template>