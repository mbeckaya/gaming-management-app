<script setup lang="ts">
    import { RouterLink } from 'vue-router'
</script>

<template>
    <nav class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <RouterLink :to="{ name: 'games.list' }" class="btn btn-ghost text-xl">Gaming Inc</RouterLink>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><RouterLink :to="{ name: 'games.list' }">List</RouterLink></li>
                <li><RouterLink :to="{ name: 'games.add' }">Create</RouterLink></li>
            </ul>
        </div>
    </nav>
</template>