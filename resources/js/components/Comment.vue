<script setup lang="ts">
import { Button } from '@/components/ui/button';

defineProps(['comment']);
defineEmits(['delete', 'edit']);
</script>

<template>
    <div>
        <span class="text-sm break-all">{{ comment.body }}</span>
        <div class="mt-2 flex justify-between items-center">
            <span class="mt-2 block text-sm text-gray-600 dark:text-gray-400"> {{ comment.created_at }} by {{ comment.user.name }} </span>
            <div class="flex gap-2 text-right empty:hidden">
                <form v-if="comment.can?.update" @submit.prevent="$emit('edit', comment.id)">
                    <Button type="submit" class="px-3 hover:opacity-60 bg-orange-400 hover:bg-orange-400">Update</Button>
                </form>
                <form v-if="comment.can?.delete" @submit.prevent="$emit('delete', comment.id)">
                    <Button type="submit" variant="destructive" class="px-3 hover:opacity-60">Delete</Button>
                </form>
            </div>
        </div>
    </div>
</template>
