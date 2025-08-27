<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { useAppearance } from '@/composables/useAppearance';
import LogoDark from '@/assets/logo-dark.svg';
import LogoWhite from '@/assets/logo-white.svg';

const { isDark } = useAppearance();

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img v-if="isDark" :src="LogoWhite" alt="logo"/>
    <img v-else :src="LogoDark" alt="logo"/>
</template>
