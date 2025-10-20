declare module '@inertiajs/vue3' {
    export * from '@inertiajs/core';
    interface LinkProps {
        // Add props you use
        only?: string[];
    }

    export const Link: Component<LinkProps>;
    export const Head: Component
    export const useForm: any;
    export const usePage: any;
}
