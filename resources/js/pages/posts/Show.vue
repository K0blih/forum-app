<script setup lang="ts">
import Container from '@/components/Container.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue';

const props = defineProps(['post', 'comments']);

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
<!--            Post-->
            <h1 class="text-2xl font-bold">
                {{ post.title }}
            </h1>

            <span class="mt-2 block text-sm text-gray-600 dark:text-gray-400"> {{ post.created_at }} by {{ post.user.name }} </span>

            <article class="mt-6">
                {{ post.body }}
            </article>

<!--            Comments-->
            <div class="mt-12">
                <h2 class="text-2xl font-semibold">Comments</h2>

                <ul class="divide-y mt-2 divide-gray-400 dark:divide-gray-700">
                    <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">
                        <span class="text-sm">{{ comment.body }}</span>
                        <span class="mt-2 block text-sm text-gray-600 dark:text-gray-400"> {{ comment.created_at }} by {{ comment.user.name }} </span>
                    </li>
                </ul>

                <Pagination :meta="comments.meta" :links="comments.links" />
            </div>
        </Container>
    </AppLayout>
</template>
