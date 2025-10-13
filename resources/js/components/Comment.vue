<script setup lang="ts">
import { router, usePage } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { computed } from 'vue';

const props = defineProps(['comment']);

const deleteComment = () => router.delete(route('comments.destroy', props.comment.id));
const canDelete = computed(() => props.comment.user.id === usePage().props.auth.user?.id);
</script>

<template>
    <div>
        <span class="text-sm break-all">{{ comment.body }}</span>
        <span class="mt-2 block text-sm text-gray-600 dark:text-gray-400"> {{ comment.created_at }} by {{ comment.user.name }} </span>
        <div class="mt-3">
            <form v-if="canDelete" @submit.prevent="deleteComment">
                <Button type="submit" variant="destructive" size="sm">Delete</Button>
            </form>
        </div>
    </div>
</template>
