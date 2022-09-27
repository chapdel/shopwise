<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import AppLayout from "@/Layouts/AppLayout.vue";
// import { MenuIcon, QuestionMarkCircleIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'

const currencies = ['CAD', 'USD', 'AUD', 'EUR', 'GBP']
const navigation = {
    categories: [
        {
            name: 'Women',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
                    imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
                    imageAlt: 'Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.',
                },
                {
                    name: 'Accessories',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg',
                    imageAlt: 'Model wearing minimalist watch with black wristband and white watch face.',
                },
                {
                    name: 'Carry',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg',
                    imageAlt: 'Model opening tan leather long wallet with credit card pockets and cash pouch.',
                },
            ],
        },
        {
            name: 'Men',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg',
                    imageAlt: 'Hats and sweaters on wood shelves next to various colors of t-shirts on hangers.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg',
                    imageAlt: 'Model wearing light heather gray t-shirt.',
                },
                {
                    name: 'Accessories',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg',
                    imageAlt:
                        'Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body.',
                },
                {
                    name: 'Carry',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg',
                    imageAlt: 'Model putting folded cash into slim card holder olive leather wallet with hand stitching.',
                },
            ],
        },
    ],
    pages: [
        { name: 'Company', href: '#' },
        { name: 'Stores', href: '#' },
    ],
}
const collections = [
    {
        name: "Women's",
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-01.jpg',
        imageAlt: 'Woman wearing a comfortable cotton t-shirt.',
    },
    {
        name: "Men's",
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg',
        imageAlt: 'Man wearing a comfortable and casual cotton t-shirt.',
    },
    {
        name: 'Desk Accessories',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg',
        imageAlt: 'Person sitting at a wooden desk with paper note organizer, pencil and tablet.',
    },
]
const trendingProducts = [
    {
        id: 1,
        name: 'Leather Long Wallet',
        color: 'Natural',
        price: '$75',
        href: '#',
        imageSrc: 'https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg',
        imageAlt: 'Hand stitched, orange leather long wallet.',
    },
    // More products...
]
const perks = [
    {
        name: 'Free returns',
        imageUrl: 'https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg',
        description: 'Not what you expected? Place it back in the parcel and attach the pre-paid postage stamp.',
    },
    {
        name: 'Same day delivery',
        imageUrl: 'https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg',
        description:
            'We offer a delivery service that has never been done before. Checkout today and receive your products within hours.',
    },
    {
        name: 'All year discount',
        imageUrl: 'https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg',
        description: 'Looking for a deal? You can use the code "ALLYEAR" at checkout and get money off all year round.',
    },
    {
        name: 'For the planet',
        imageUrl: 'https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg',
        description: 'We’ve pledged 1% of sales to the preservation and restoration of the natural environment.',
    },
]
const footerNavigation = {
    products: [
        { name: 'Bags', href: '#' },
        { name: 'Tees', href: '#' },
        { name: 'Objects', href: '#' },
        { name: 'Home Goods', href: '#' },
        { name: 'Accessories', href: '#' },
    ],
    company: [
        { name: 'Who we are', href: '#' },
        { name: 'Sustainability', href: '#' },
        { name: 'Press', href: '#' },
        { name: 'Careers', href: '#' },
        { name: 'Terms & Conditions', href: '#' },
        { name: 'Privacy', href: '#' },
    ],
    customerService: [
        { name: 'Contact', href: '#' },
        { name: 'Shipping', href: '#' },
        { name: 'Returns', href: '#' },
        { name: 'Warranty', href: '#' },
        { name: 'Secure Payments', href: '#' },
        { name: 'FAQ', href: '#' },
        { name: 'Find a store', href: '#' },
    ],
}

const open = ref(false)

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    popular: Object,
    arrival: Object,
    categories: Object,
});
</script>

<template>

    <Head title="Welcome" />

    <AppLayout>
        <div class="relative">
            <!-- Background image and overlap -->
            <div aria-hidden="true" class="hidden absolute inset-0 sm:flex sm:flex-col">
                <div class="flex-1 relative w-full bg-gray-800">
                    <div class="absolute inset-0 overflow-hidden">
                        <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg" alt=""
                            class="w-full h-full object-center object-cover" />
                    </div>
                    <div class="absolute inset-0 bg-gray-900 opacity-50" />
                </div>
                <div class="w-full bg-white h-32 md:h-40 lg:h-48" />
            </div>

            <div class="relative max-w-3xl mx-auto pb-96 px-4 text-center sm:pb-0 sm:px-6 lg:px-8">
                <!-- Background image and overlap -->
                <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
                    <div class="flex-1 relative w-full bg-gray-800">
                        <div class="absolute inset-0 overflow-hidden">
                            <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-hero-full-width.jpg"
                                alt="" class="w-full h-full object-center object-cover" />
                        </div>
                        <div class="absolute inset-0 bg-gray-900 opacity-50" />
                    </div>
                    <div class="w-full bg-white h-48" />
                </div>
                <!-- <div class="relative py-32">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">Mid-Season
                        Sale</h1>
                    <div class="mt-4 sm:mt-6">
                        <a href="#"
                            class="inline-block bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop
                            Collection</a>
                    </div>
                </div> -->
            </div>

            <!-- <section aria-labelledby="collection-heading" class="-mt-96 relative sm:mt-0">
                <h2 id="collection-heading" class="sr-only">Collections</h2>
                <div
                    class="max-w-md mx-auto grid grid-cols-1 gap-y-6 px-4 sm:max-w-7xl sm:px-6 sm:grid-cols-3 sm:gap-y-0 sm:gap-x-6 lg:px-8 lg:gap-x-8">
                    <div v-for="collection in collections" :key="collection.name"
                        class="group relative h-96 bg-white rounded-lg shadow-xl sm:h-auto sm:aspect-w-4 sm:aspect-h-5">
                        <div>
                            <div aria-hidden="true" class="absolute inset-0 rounded-lg overflow-hidden">
                                <div class="absolute inset-0 overflow-hidden group-hover:opacity-75">
                                    <img :src="collection.imageSrc" :alt="collection.imageAlt"
                                        class="w-full h-full object-center object-cover" />
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50" />
                            </div>
                            <div class="absolute inset-0 rounded-lg p-6 flex items-end">
                                <div>
                                    <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                                    <h3 class="mt-1 font-semibold text-white">
                                        <a :href="collection.href">
                                            <span class="absolute inset-0" />
                                            {{ collection.name }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
        </div>

        <section aria-labelledby="trending-heading">
            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
                <div class="md:flex md:items-center md:justify-between">
                    <h2 id="favorites-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">New arrival
                    </h2>
                    <!-- <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">Shop
                        the collection<span aria-hidden="true"> &rarr;</span></a> -->
                </div>

                <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                    <div v-for="product in popular.data" :key="product.slug" class="group relative">
                        <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                            <img :src="product.image_src?? 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg'"
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

                <div class="mt-8 text-sm md:hidden">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span
                            aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>
        </section>

        <section aria-labelledby="trending-heading">
            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:pt-32 lg:px-8">
                <div class="md:flex md:items-center md:justify-between">
                    <h2 id="favorites-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">Popular
                        Products</h2>
                    <!-- <a href="#" class="hidden text-sm font-medium text-indigo-600 hover:text-indigo-500 md:block">Shop
                                the collection<span aria-hidden="true"> &rarr;</span></a> -->
                </div>

                <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
                    <div v-for="product in arrival.data" :key="product.slug" class="group relative">
                        <div class="w-full h-56 rounded-md overflow-hidden group-hover:opacity-75 lg:h-72 xl:h-80">
                            <img :src="product.image_src?? 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg'"
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

                <div class="mt-8 text-sm md:hidden">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Shop the collection<span
                            aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>
        </section>

        <section aria-labelledby="perks-heading" class="bg-gray-50 border-t border-gray-200">
            <h2 id="perks-heading" class="sr-only">Our perks</h2>

            <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
                <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
                    <div v-for="perk in perks" :key="perk.name"
                        class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                        <div class="md:flex-shrink-0">
                            <div class="flow-root">
                                <img class="-my-1 h-24 w-auto mx-auto" :src="perk.imageUrl" alt="" />
                            </div>
                        </div>
                        <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                            <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">
                                {{ perk.name }}
                            </h3>
                            <p class="mt-3 text-sm text-gray-500">
                                {{ perk.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>
