<template>
    <main class="min-w-[200px]">
        <div class="h-[80px] px-3 flex items-center gap-3">
            <Link :href="route('myFiles')">
            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
            </Link>
            <b>FMS</b>
        </div>
        <div class="px-3">
            <CreateNewDropdown />
            <div class="py-3">
                <NavLink :href="route('myFiles')" :active="$page.url == '/my-files'">My Files</NavLink>
                <NavLink href="/">Shared with me</NavLink>
                <NavLink href="/">Shared by me</NavLink>
                <NavLink href="/">Trash</NavLink>
            </div>
        </div>
    </main>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "../Global/ApplicationLogo.vue";
import CreateNewDropdown from "./CreateNewDropdown.vue";
import NavLink from "../Global/NavLink.vue";
</script>