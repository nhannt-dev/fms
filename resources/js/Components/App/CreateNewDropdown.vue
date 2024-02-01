<template>
    <Menu as="div" class="relative block text-left">
        <div>
            <MenuButton
                class="inline-flex w-full justify-center rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                Create New
            </MenuButton>
        </div>

        <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0"
            enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in"
            leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
            <MenuItems
                class="absolute left-0 mt-2 w-52 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none">
                <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                    <a href="javascript:void(0)" @click.prevent="showCreateFolderModal"
                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        New Folder
                    </a>
                    </MenuItem>
                </div>
                <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                    <a href="/" as="button"
                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        Upload Folders
                    </a>
                    </MenuItem>
                </div>
                <div class="px-1 py-1">
                    <MenuItem v-slot="{ active }">
                    <a href="/" as="button"
                        :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                        Upload Files
                    </a>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
    <CreateFolderModal v-model="createFolderModal"/>
</template>

<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import CreateFolderModal from './CreateFolderModal.vue';
import { ref } from 'vue';

const createFolderModal = ref(false)

function showCreateFolderModal() {
    createFolderModal.value = true
}
</script>