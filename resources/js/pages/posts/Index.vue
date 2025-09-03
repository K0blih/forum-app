<script setup lang="ts">
import Container from '@/components/Container.vue';
import Pagination from '@/components/Pagination.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
];

defineProps(['posts']);
</script>

<template>
    <Head title="Posts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Container>
            <ul class="divide-y divide-gray-400 dark:divide-gray-700">
                <li v-for="post in posts.data" :key="post.id">
                    <Link :href="route('posts.show', post.id)" class="block px-2 py-4 group">
                        <span class="text-lg font-bold group-hover:text-indigo-500">{{ post.title }}</span>
                        <span class="block mt-2 text-sm text-gray-600 dark:text-gray-400"> {{ post.created_at }} by {{ post.user.name }} </span>
                    </Link>
                </li>
            </ul>

            <Pagination :meta="posts.meta" :links="posts.links" />
        </Container>
    </AppLayout>
</template>

<style scoped></style>
