<template>
    <Modal :show="modelValue" @show="onShow">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Create New Folder</h2>
            <div class="mt-6">
                <InputLabel for="folderName" value="Folder Name" class="sr-only" />
                <TextInput ref="folderNameInput" type="text" id="folderName" v-model="form.name" class="mt-1 block w-full"
                    :class="form.errors.name ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : ''"
                    placeholder="Folder Name" @keyup.enter="createFolder" />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>
            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal">Cancel</SecondaryButton>
                <PrimaryButton class="ml-3" @click="createFolder" :disable="form.processing"
                    :class="{ 'opacity-25': form.processing }">Submit</PrimaryButton>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '../Global/Modal.vue'
import InputLabel from '../Global/InputLabel.vue';
import TextInput from '../Global/TextInput.vue';
import InputError from '../Global/InputError.vue';
import SecondaryButton from '../Global/SecondaryButton.vue';
import PrimaryButton from '../Global/PrimaryButton.vue';

import { nextTick, ref } from "vue";
import { useForm } from '@inertiajs/vue3';

const { modelValue } = defineProps({
    modelValue: Boolean
})

const folderNameInput = ref(null)

const emit = defineEmits(['update:modelValue'])

const form = useForm({
    name: ''
})

function onShow() {
    nextTick(() => folderNameInput.value.focus())
}

function createFolder() {
    form.post(route('folder.create'), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal()
            form.reset()
        },
        onError: () => folderNameInput.value.focus()
    })
}

function closeModal() {
    emit('update:modelValue')
    form.clearErrors()
    form.reset()
}
</script>