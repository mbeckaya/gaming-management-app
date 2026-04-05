<script setup lang="ts">
    import type { Column } from '@/types/columns'

    const props = defineProps<{
        cols: Column[],
        item: any,
    }>()
</script>

<template>
    <div v-if="item" class="card bg-base-100 shadow-md p-4">
        <ul class="space-y-1">
             <li v-for="col in props.cols" :key="col.key">
            <span class="font-semibold">{{ col.label }}:</span> {{ item[col.key] }}
        </li>
        </ul>
    </div>
</template>