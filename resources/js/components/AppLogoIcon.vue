<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { useAppearance } from '@/composables/useAppearance';

const { appearance } = useAppearance();

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img v-if="appearance === 'dark'" src="@/assets/logo-dark.svg" alt="logo"/>
    <img v-else src="@/assets/logo-white.svg" alt="logo"/>
</template>
