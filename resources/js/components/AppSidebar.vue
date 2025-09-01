<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
        isActive: !!usePage().props.auth.user,
    },
    {
        title: 'Posts',
        href: '/posts',
        icon: BookOpen,
        isActive: true,
    },
];

const footerNavItems: NavItem[] = [
    // {
    //     title: 'Login',
    //     href: '/login',
    //     icon: LayoutGrid,
    //     isActive: !usePage().props.auth.user,
    // },
    // {
    //     title: 'Register',
    //     href: '/register',
    //     icon: LayoutGrid,
    //     isActive: !usePage().props.auth.user,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('home')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter  :items="footerNavItems" />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
