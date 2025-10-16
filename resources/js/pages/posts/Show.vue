<script setup lang="ts">
import Comment from '@/components/Comment.vue';
import Container from '@/components/Container.vue';
import InputError from '@/components/InputError.vue';
import Pagination from '@/components/Pagination.vue';
import { Button } from '@/components/ui/button';
import { Textarea } from '@/components/ui/textarea';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { Head, router, useForm } from '@inertiajs/vue3';

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

const commentForm = useForm({
    body: '',
});

const addComment = () =>
    commentForm.post(route('posts.comments.store', props.post.id), {
        preserveScroll: true,
        onSuccess: () => commentForm.reset(),
    });

const deleteComment = (commentId: any) =>
    router.delete(route('comments.destroy', { comment: commentId, page: props.comments.meta.current_page }), {
        preserveScroll: true,
    });
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

                <form @submit.prevent="addComment">
                    <div class="mt-6">
                        <Label for="comment" class="sr-only">Comment</Label>
                        <Textarea id="body" v-model="commentForm.body" rows="4" placeholder="Write a comment..." />
                        <InputError :message="commentForm.errors.body" class="mt-2" />
                    </div>

                    <Button type="submit" variant="default" class="mt-3 hover:opacity-60" :disabled="commentForm.processing"> Add Comment </Button>
                </form>

                <ul class="mt-2 divide-y divide-gray-400 dark:divide-gray-700">
                    <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">
                        <Comment @delete="deleteComment" :comment="comment" />
                    </li>
                </ul>

                <Pagination :meta="comments.meta" :links="comments.links" :only="['comments']" />
            </div>
        </Container>
    </AppLayout>
</template>
