<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    central_domain: String,
})

const form = useForm({
    company: '',
    domain: '',
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <h3 class="font-semibold tracking-tight text-2xl dark:text-white">Create an account</h3>

            <div class="mt-4 pt-4 border-t dark:border-gray-900">
                <InputLabel for="company" value="Company" />

                <TextInput
                    id="company"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.company"
                    required
                    autofocus
                    autocomplete="company"
                />

                <InputError class="mt-2" :message="form.errors.company" />
            </div>

            <div class="mt-4">
                <InputLabel for="domain" value="Domain" />

                <div class="mt-1 flex">
                    <TextInput
                        id="domain"
                        type="text"
                        class="block w-full rounded-r-none"
                        v-model="form.domain"
                        required
                        autocomplete="domain"
                    />
                    <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 dark:border-gray-700 px-2 text-gray-500 sm:text-sm">
                        <InputLabel for="domain">{{ '.' + central_domain }}</InputLabel>
                    </span>
                </div>

                <InputError class="mt-2" :message="form.errors.domain" />
            </div>

            <div class="mt-4 pt-4 grid grid-cols-2 items-center space-x-2 border-t dark:border-gray-900">
                <div>
                    <InputLabel for="first_name" value="First name" />

                    <TextInput
                        id="first_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.first_name"
                        required
                        autocomplete="first_name"
                    />

                    <InputError class="mt-2" :message="form.errors.first_name" />
                </div>

                <div>
                    <InputLabel for="last_name" value="Last name" />

                    <TextInput
                        id="last_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.last_name"
                        required
                        autocomplete="last_name"
                    />

                    <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
