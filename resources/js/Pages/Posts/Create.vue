<template>

  <Head title="New Post" />

  <div class="flex sm:justify-center py-6">
    <form class="w-full md:w-2/3 px-3">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
            Title
          </label>
          <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="title" type="text" placeholder="Jane">
        </div>
        <div class="w-full md:w-1/3 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="category">
            Category
          </label>
          <div class="relative">
            <select
              class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              id="category">
              <option v-for="category in categories">{{ category.name }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content">
            Content
          </label>
          <textarea
            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
            id="content" rows="10" />
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import BreezeButton from '@/Components/Shared/Button.vue';
import BreezeInput from '@/Components/Shared/Input.vue';
import BreezeLabel from '@/Components/Shared/Label.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
  title: '',
  content: '',
  remember: false
});

const submit = () => {
  form.post(route('posts.create'), {
    onFinish: () => form.reset(),
  });
};

defineProps({ categories: [Object] })
</script>