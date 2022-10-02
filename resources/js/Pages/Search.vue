<template>
    <div>
        <AppLayout>
            <section aria-labelledby="trending-heading">
                <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
                    <form @submit.prevent="search()" class="mb-3">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input v-model="form.q" type="search" id="default-search"
                                class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-pink-500 focus:border-pink-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500"
                                placeholder="Search Products...">
                            <button type="submit"
                                class="text-white absolute right-2.5 bottom-2.5 bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Search</button>
                        </div>
                    </form>
                    <div class="md:flex md:items-center md:justify-between">
                        <h2 id="favorites-heading" v-if="q"
                            class="text-2xl font-extrabold tracking-tight text-gray-900">
                            Search for "{{ q }}" | <span class="text-sm">[{{results.length}} Result(s)]</span>
                        </h2>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                        <div v-for="product in results" :key="product.slug" class="group relative">
                            <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                                <img :src="product.media[0].original_url?? 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg'"
                                    :alt="product.imageAlt" class="w-full h-full object-center object-cover" />
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                <Link :href="route('product.show', product.slug)">
                                <span class="absolute inset-0" />
                                {{ product.name }}
                                </Link>
                            </h3>
                            <p class="mt-1 text-sm font-medium text-gray-900">{{ product.converted_price }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </AppLayout>
    </div>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/inertia-vue3';
const props = defineProps({
    results: Array,
    q: String,
    response: Boolean
})
const form = useForm({
    q: props.q
})

const search = () => {
    form.get('search')
}

</script>
