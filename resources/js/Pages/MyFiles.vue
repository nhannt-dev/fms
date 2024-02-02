<template>
    <Head title="My files" />
    <AuthenticatedLayout>
        <table class="min-w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Owner</th>
                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Last Modified</th>
                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Size</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="file in files.data" :key="file?.id" @dblclick="openFolder(file)"
                    class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text">
                        {{ file?.name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ file?.owner }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ file?.updated_at }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ file?.name }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-if="!files?.data?.length" class="py-8 text-center text-lg text-gray-400">
            There isn't data in this folder
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const { files } = defineProps({
    files: Array
})

function openFolder(file) {
    if (!file.is_folder) return;
    router.visit(route('myFiles', { folder: file?.path }))
}
</script>

<style lang="css">
.text {
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -khtml-user-select: none;
}
</style>