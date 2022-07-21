<template>
    <div class="container mx-auto">
        <header class="flex items-center justify-between py-10 px-3">
            <Link aria-label="Awesome Blog" href="/">
            <div class="h-6 text-2xl font-semibold">Awesome Blog</div>
            </Link>
            <div class="flex items-center text-base leading-5">
                <div class="hidden sm:block">
                    <Link class="font-medium text-gray-900 sm:p-4" href="/posts/create" v-if="!!auth.user">
                    Something to post?
                    </Link>
                    <Link class="font-medium text-gray-900 sm:p-4" href="/login" v-if="!auth.user">Login</Link>
                    <Link class="font-medium text-gray-900 sm:p-4" href="/logout" method="POST" v-if="!!auth.user">
                    Logout
                    </Link>
                    <Link class="font-medium text-gray-900 sm:p-4" href="/register">Register</Link>
                </div>

                <div class="sm:hidden">
                    <button type="button" class="ml-1 mr-1 h-8 w-8 rounded py-1" aria-label="Toggle Menu"
                        @click="isOpen = !isOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="text-gray-900">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        <div class="sm:hidden flex flex-col divide-y divide-solid divide-y-1" v-if="isOpen">
            <Link class="font-medium text-gray-900 sm:p-4" href="/posts/create" v-if="!!auth.user">
            Something to post?
            </Link>
            <Link class="px-5 py-3 text-gray-900" href="/login" v-if="!auth.user">Login</Link>
            <Link class="px-5 py-3 text-gray-900" href="/register" v-if="!auth.user">Register</Link>
            <Link class="px-5 py-3 text-gray-900" href="/logout" method="POST" v-if="!!auth.user">
            Logout
            </Link>

        </div>
        <slot />
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3';
const isOpen = ref(false);
defineProps({ auth: Object })
</script>