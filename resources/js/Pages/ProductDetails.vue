<template>
    <AppLayout>
        <div
            class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
            <!-- Product details -->
            <div class="lg:max-w-lg lg:self-end">
                <nav aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-2">
                        <li v-for="(breadcrumb, breadcrumbIdx) in product.breadcrumbs" :key="breadcrumb.id">
                            <div class="flex items-center text-sm">
                                <a :href="breadcrumb.href" class="font-medium text-gray-500 hover:text-gray-900">
                                    {{ breadcrumb.name }}
                                </a>
                                <svg v-if="breadcrumbIdx !== product.breadcrumbs.length - 1" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-hidden="true"
                                    class="ml-2 flex-shrink-0 h-5 w-5 text-gray-300">
                                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                </svg>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-4">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ product.name }}</h1>
                </div>

                <section aria-labelledby="information-heading" class="mt-4">
                    <h2 id="information-heading" class="sr-only">Product information</h2>

                    <div class="flex items-center">
                        <p class="text-lg text-gray-900 sm:text-xl">{{ product.converted_price }}</p>

                        <!-- <div class="ml-4 pl-4 border-l border-gray-300">
                            <h2 class="sr-only">Reviews</h2>
                            <div class="flex items-center">
                                <div>
                                    <div class="flex items-center">
                                        <StarIcon v-for="rating in [0, 1, 2, 3, 4]" :key="rating"
                                            :class="[reviews.average > rating ? 'text-yellow-400' : 'text-gray-300', 'h-5 w-5 flex-shrink-0']"
                                            aria-hidden="true" />
                                    </div>
                                    <p class="sr-only">{{ reviews.average }} out of 5 stars</p>
                                </div>
                                <p class="ml-2 text-sm text-gray-500">{{ reviews.totalCount }} reviews</p>
                            </div>
                        </div> -->
                    </div>

                    <div class="mt-4 space-y-6">
                        <p class="text-base text-gray-500">{{ product.description }}</p>
                    </div>

                    <div class="mt-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="flex-shrink-0 w-5 h-5 text-green-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="ml-2 text-sm text-gray-500">In stock and ready to ship</p>
                    </div>
                </section>
            </div>

            <!-- Product image -->
            <div class="mt-10 lg:mt-0 lg:col-start-2 lg:row-span-2 lg:self-center">
                <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                    <img :src="product.image_src?? 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg'"
                        :alt="product.imageAlt" class="w-full h-full object-center object-cover" />
                </div>
            </div>

            <div class="mt-10 lg:max-w-lg lg:col-start-1 lg:row-start-2 lg:self-start">
                <section aria-labelledby="options-heading">
                    <h2 id="options-heading" class="sr-only">Product options</h2>
                    <form>
                        <!--  <div class="sm:flex sm:justify-between">
                            <RadioGroup v-model="selectedSize">
                                <RadioGroupLabel class="block text-sm font-medium text-gray-700"> Size
                                </RadioGroupLabel>
                                <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <RadioGroupOption as="template" v-for="size in product.sizes" :key="size.name"
                                        :value="size" v-slot="{ active, checked }">
                                        <div
                                            :class="[active ? 'ring-2 ring-pink-500' : '', 'relative block border border-gray-300 rounded-lg p-4 cursor-pointer focus:outline-none']">
                                            <RadioGroupLabel as="p" class="text-base font-medium text-gray-900">
                                                {{ size.name }}
                                            </RadioGroupLabel>
                                            <RadioGroupDescription as="p" class="mt-1 text-sm text-gray-500">
                                                {{ size.description }}
                                            </RadioGroupDescription>
                                            <div :class="[active ? 'border' : 'border-2', checked ? 'border-pink-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']"
                                                aria-hidden="true" />
                                        </div>
                                    </RadioGroupOption>
                                </div>
                            </RadioGroup>
                        </div> -->
                        <!-- <div class="mt-4">
                            <a href="#" class="group inline-flex text-sm text-gray-500 hover:text-gray-700">
                                <span>What size should I buy?</span>
                                <QuestionMarkCircleIcon
                                    class="flex-shrink-0 ml-2 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    aria-hidden="true" />
                            </a>
                        </div> -->
                        <div class="mt-10">
                            <button type="submit" @click.prevent="addToCart(product.slug)"
                                class="w-full bg-pink-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-pink-500">Add
                                to bag</button>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="#" class="group inline-flex text-base font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="flex-shrink-0 mr-2 h-6 w-6 text-gray-400 group-hover:text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                </svg>

                                <span class="text-gray-500 hover:text-gray-700">Lifetime Guarantee</span>
                            </a>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { Inertia, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    product: Object
})

const form = useForm({
    id: '',
});

/* const product = {
    name: 'Everyday Ruck Snack',
    href: '#',
    price: '$220',
    description:
        "Don't compromise on snack-carrying capacity with this lightweight and spacious bag. The drawstring top keeps all your favorite chips, crisps, fries, biscuits, crackers, and cookies secure.",
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg',
    imageAlt: 'Model wearing light green backpack with black canvas straps and front zipper pouch.',
    breadcrumbs: [
        { id: 1, name: 'Travel', href: '#' },
        { id: 2, name: 'Bags', href: '#' },
    ],
    sizes: [
        { name: '18L', description: 'Perfect for a reasonable amount of snacks.' },
        { name: '20L', description: 'Enough room for a serious amount of snacks.' },
    ],
} */

const addToCart = (product) => {
    form.post(route('cart.add', { slug: product }))
}
</script>
