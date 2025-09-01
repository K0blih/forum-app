<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import Container from '@/components/Container.vue';
import Pagination from '@/components/Pagination.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
];

defineProps(['posts']);
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs" >
        <Container>
            <ul class="divide-y divide-gray-400 dark:divide-gray-700">
                <li v-for="post in posts.data"
                    :key="post.id"
                    class="px-2 py-4"
                >
                    <span class="font-bold text-lg">{{ post.title }}</span>
                </li>
            </ul>

            <Pagination :meta="posts.meta" :links="posts.links" />
        </Container>
    </AppLayout>
</template>

<style scoped></style>
