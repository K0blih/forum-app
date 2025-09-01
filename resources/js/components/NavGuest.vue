<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
</script>

<template>
    <div class="flex gap-2">
        <Button as-child variant="ghost" class="flex-1">
            <Link :href="route('login')">Login</Link>
        </Button>
        <Button as-child variant="outline" class="flex-1">
            <Link :href="route('register')">Register</Link>
        </Button>
    </div>
</template>

<style scoped></style>
