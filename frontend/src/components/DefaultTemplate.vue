<script setup lang="ts">
    import Navigation from '@/components/Navigation.vue'

    const currentYear = new Date().getFullYear()
</script>

<template>
    <header>
        <Navigation />
    </header>

    <main class="container mx-auto p-4">
        <h1 class="text-xl mb-4">
          <slot name="headline"></slot>
        </h1>

        <slot name="default"></slot>
    </main>

    <footer class="p-2 p-4 bg-black text-white">
        <slot name="footer">
            © {{ currentYear }} Gaming Inc
        </slot>
    </footer>
</template>