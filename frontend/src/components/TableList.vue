<script setup lang="ts">
    import { computed } from 'vue'
    import { RouterLink } from 'vue-router'
    import type { Column } from '@/types/columns'

    type Props = {
        cols: Column[],
        items: any,
        hasDeleteAction?: boolean,
        hasDetailAction?: boolean,
        hasEditAction?: boolean,
    }

    const props = withDefaults(defineProps<Props>(), {
        hasDeleteAction: false,
        hasDetailAction: false,
        hasEditAction: false,
    })

    const hasActions = computed(() => {
        return props.hasDeleteAction || props.hasDetailAction || props.hasEditAction
    })

    const emit = defineEmits<{
        (e: 'delete', id: number): void
    }>()

    const onDelete = (id: number) => {
        emit('delete', id)
    }
</script>

<template>
    <div class="overflow-x-auto">
        <table v-if="items" class="table table-zebra">
            <thead>
                <tr>
                    <th v-for="col in props.cols" :key="col.key">
                        {{ col.label }}
                    </th>

                    <th v-if="hasActions">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in props.items" :key="item.id">
                    <td v-for="col in cols" :key="col.key">
                        {{ item[col.key] }}
                    </td>

                    <td v-if="hasActions" class="flex gap-2">
                        <RouterLink
                            v-if="hasDetailAction && item?.id"
                            :to="{ name: 'games.item', params: { id: item.id } }" 
                            class="btn btn-primary"
                        >
                            Show
                        </RouterLink>

                        <RouterLink
                            v-if="hasEditAction && item?.id"
                            :to="{ name: 'games.edit', params: { id: item.id } }" 
                            class="btn btn-secondary"
                        >
                            Edit
                        </RouterLink>

                        <button 
                            v-if="hasDeleteAction"
                            @click="onDelete(item.id)" 
                            class="btn btn-error"
                        >
                            Delete
                        </button>
                    </td> 
                </tr>
            </tbody>
        </table>
    </div>
</template>