<script setup lang="ts">
    import { computed } from 'vue'

    const props = defineProps<{
        type: 'error' | 'success'
    }>()

    const alertMessageStyle = computed(() => {
        switch (props.type) {
            case 'error':
                return 'text-red-500 bg-red-50'
            case 'success':
                return 'text-green-500 bg-green-50'
        }
    })
</script>

<template>
    <p :class="['p-4', alertMessageStyle]">
        <slot />
    </p>
</template>