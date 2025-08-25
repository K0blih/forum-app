<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { useAppearance } from '@/composables/useAppearance';
import LogoDark from '@/assets/logo-dark.svg';
import LogoWhite from '@/assets/logo-white.svg';

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
    <img v-if="appearance === 'dark'" :src="LogoDark" alt="logo"/>
    <img v-else :src="LogoWhite" alt="logo"/>
</template>
