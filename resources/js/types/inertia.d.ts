declare module '@inertiajs/vue3' {
    interface LinkProps {
        // Add props you use
        only?: string[];
    }

    export const Link: Component<LinkProps>;
}
