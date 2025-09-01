import { ref, onMounted, onUnmounted, computed } from 'vue';

export function useBreakpoints() {
    const width = ref(window.innerWidth)

    const update = () => {
        width.value = window.innerWidth
    }

    onMounted(() => window.addEventListener('resize', update))
    onUnmounted(() => window.removeEventListener('resize', update))

    // Tailwind default breakpoints
    // const sm = 640
    const md = 768
    const lg = 1024
    const xl = 1280
    const xxl = 1536

    return {
        width,
        isMobile: computed(() => width.value < lg), // < 1024px
        isTablet: computed(() => width.value >= md && width.value < lg),
        isDesktop: computed(() => width.value >= lg),
        isXL: computed(() => width.value >= xl),
        is2XL: computed(() => width.value >= xxl),
    }
}
