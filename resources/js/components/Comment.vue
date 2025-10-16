<script setup lang="ts">
import { Button } from '@/components/ui/button';

defineProps(['comment']);
defineEmits(['delete']);
</script>

<template>
    <div>
        <span class="text-sm break-all">{{ comment.body }}</span>
        <div class="flex justify-between items-center">
            <span class="mt-2 block text-sm text-gray-600 dark:text-gray-400"> {{ comment.created_at }} by {{ comment.user.name }} </span>
            <div class="text-right empty:hidden">
                <form v-if="comment.can?.delete" @submit.prevent="$emit('delete', comment.id)">
                    <Button type="submit" variant="destructive" class="px-3 hover:opacity-60">Delete</Button>
                </form>
            </div>
        </div>
    </div>
</template>
