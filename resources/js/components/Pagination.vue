<script setup lang="ts">
import { useBreakpoints } from '@/composables/useBreakpoints';
import { Link } from '@inertiajs/vue3';

defineProps({
    meta: {
        type: Object,
        required: true,
    },

    links: {
        type: Object,
        required: true,
    },

    only: {
        type: Array,
        default: () => [],
    },
});

const { isDesktop } = useBreakpoints();
</script>

<template>
    <!--        desktop-->
    <div
        class="flex items-center justify-between gap-10 border-t border-gray-200 bg-white px-4 py-3 sm:px-6 dark:border-white/10 dark:bg-transparent"
    >
        <div>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Showing
                <span class="font-medium">{{ meta.from }}</span>
                to
                <span class="font-medium">{{ meta.to }}</span>
                of
                <span class="font-medium">{{ meta.total }}</span>
                results
            </p>
        </div>
        <div v-if="isDesktop" class="flex flex-1 justify-between">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs dark:shadow-none" aria-label="Pagination">
                <Link
                    v-for="link in meta.links"
                    :key="link.label"
                    :href="link.url || '#'"
                    :only="only"
                    class="relative inline-flex items-center border border-gray-300 px-4 py-2 first-of-type:rounded-l-md last-of-type:rounded-r-md"
                    :class="{
                        'z-10 bg-indigo-600 text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:border-white/10 dark:bg-indigo-500 dark:text-white dark:focus-visible:outline-indigo-500':
                            link.active,
                        'text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-white/10 dark:bg-white/5 dark:text-gray-200 dark:hover:bg-white/10':
                            !link.active,
                        'pointer-events-none opacity-50': !link.url,
                    }"
                >
                    {{ link.label }}
                </Link>
            </nav>
        </div>
        <div v-else class="flex flex-1 justify-between">
            <Link
                :href="links.prev || '#'"
                :only="only"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-white/10 dark:bg-white/5 dark:text-gray-200 dark:hover:bg-white/10"
                :class="{
                    'pointer-events-none opacity-50': !links.prev,
                }"
            >
                Previous
            </Link>
            <Link
                :href="links.next || '#'"
                :only="only"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-white/10 dark:bg-white/5 dark:text-gray-200 dark:hover:bg-white/10"
                :class="{
                    'pointer-events-none opacity-50': !links.next,
                }"
            >
                Next
            </Link>
        </div>
    </div>
</template>
