<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Container from '@/components/Container.vue';

const props = defineProps(['post']);

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
    {
        title: props.post.title,
        href: `/posts/${props.post.id}`,
    },
];
</script>

<template>
    <Head title="Post" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <Container>
            <h1 class="text-2xl font-bold">
                {{ post.title }}
            </h1>

            <span class="block mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ post.created_at }} by {{ post.user.name }}
            </span>

            <article class="mt-6">
                {{ post.body }}
            </article>
        </Container>
    </AppLayout>
</template>
