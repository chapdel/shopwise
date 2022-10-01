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
});
</script>

<template>

    <div class="bg-white">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="open = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full" enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                    leave-to="-translate-x-full">
                    <div class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                        <div class="px-4 pt-5 pb-2 flex">
                            <button type="button"
                                class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                                @click="open = false">
                                <span class="sr-only">Close menu</span>
                                <XIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>

                        <!-- Links -->
                        <TabGroup as="div" class="mt-2">
                            <div class="border-b border-gray-200">
                                <TabList class="-mb-px flex px-4 space-x-8">
                                    <Tab as="template" v-for="category in navigation.categories" :key="category.name"
                                        v-slot="{ selected }">
                                        <button
                                            :class="[selected ? 'text-pink-600 border-pink-600' : 'text-gray-900 border-transparent', 'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium']">
                                            {{ category.name }}
                                        </button>
                                    </Tab>
                                </TabList>
                            </div>
                            <TabPanels as="template">
                                <TabPanel v-for="category in navigation.categories" :key="category.name"
                                    class="px-4 py-6 space-y-12">
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                                        <div v-for="item in category.featured" :key="item.name" class="group relative">
                                            <div
                                                class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                <img :src="item.imageSrc" :alt="item.imageAlt"
                                                    class="object-center object-cover" />
                                            </div>
                                            <a :href="item.href" class="mt-6 block text-sm font-medium text-gray-900">
                                                <span class="absolute z-10 inset-0" aria-hidden="true" />
                                                {{ item.name }}
                                            </a>
                                            <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                        </div>
                                    </div>
                                </TabPanel>
                            </TabPanels>
                        </TabGroup>

                        <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                            <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                                <a :href="page.href" class="-m-2 p-2 block font-medium text-gray-900">{{ page.name
                                }}</a>
                            </div>
                        </div>

                        <div v-if="!$page.props.user" class="border-t border-gray-200 py-6 px-4 space-y-6">
                            <div class="flow-root">
                                <Link :href="route('register')" class="-m-2 p-2 block font-medium text-gray-900">Create
                                an account</Link>
                            </div>
                            <div class="flow-root">
                                <Link :href="route('signin')" class="-m-2 p-2 block font-medium text-gray-900">Sign in
                                </Link>
                            </div>
                        </div>

                        <div v-else class="border-t border-gray-200 py-6 px-4 space-y-6">
                            <div class="flow-root">
                                <Link :href="route('register')" class="-m-2 p-2 block font-medium text-gray-900">
                                Dashboard</Link>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                            <!-- Currency selector -->
                            <form>
                                <div class="inline-block">
                                    <label for="mobile-currency" class="sr-only">Currency</label>
                                    <div
                                        class="-ml-2 group relative border-transparent rounded-md focus-within:ring-2 focus-within:ring-white">
                                        <select id="mobile-currency" name="currency"
                                            class="bg-none border-transparent rounded-md py-0.5 pl-2 pr-5 flex items-center text-sm font-medium text-gray-700 group-hover:text-gray-800 focus:outline-none focus:ring-0 focus:border-transparent">
                                            <option v-for="currency in currencies" :key="currency">{{ currency }}
                                            </option>
                                        </select>
                                        <div class="absolute right-0 inset-y-0 flex items-center pointer-events-none">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20" class="w-5 h-5 text-gray-500">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" d="M6 8l4 4 4-4" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </TransitionChild>
            </Dialog>
        </TransitionRoot>

        <header class="relative">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div class="bg-gray-900">
                    <div class="max-w-7xl mx-auto h-10 px-4 flex items-center justify-between sm:px-6 lg:px-8">
                        <!-- Currency selector -->
                        <form>
                            <div>

                            </div>
                        </form>

                        <div v-if="$page.props.user" class="flex items-center space-x-6">
                            <Link :href="route('dashboard')" class="text-sm font-medium text-white hover:text-gray-100">
                            Dashboard</Link>
                        </div>
                        <div v-else class="flex items-center space-x-6">
                            <Link :href="route('login')" class="text-sm font-medium text-white hover:text-gray-100">Sign
                            in</Link>
                            <Link :href="route('register')" class="text-sm font-medium text-white hover:text-gray-100">
                            Create an account</Link>
                        </div>
                    </div>
                </div>

                <!-- Secondary navigation -->
                <div class="bg-white">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="h-16 flex items-center justify-between">
                            <!-- Logo (lg+) -->
                            <div class="hidden lg:flex-1 lg:flex lg:items-center">
                                <Link href="/">
                                <span class="sr-only">Shopwise</span>
                                <img class="h-8 w-auto"
                                    src="https://raw.githubusercontent.com/tchombou/shopwise/main/public/logo.png"
                                    alt="" />
                                </Link>
                            </div>

                            <div class="hidden h-full lg:flex">
                                <!-- Flyout menus -->
                                <PopoverGroup class="px-4 bottom-0 inset-x-0">
                                    <div class="h-full flex justify-center space-x-8">
                                        <Popover v-for="category in navigation.categories" :key="category.name"
                                            class="flex" v-slot="{ open }">
                                            <div class="relative flex">
                                                <PopoverButton
                                                    :class="[open ? 'text-pink-600' : 'text-gray-700 hover:text-gray-800', 'relative flex items-center justify-center transition-colors ease-out duration-200 text-sm font-medium']">
                                                    {{ category.name }}
                                                    <span
                                                        :class="[open ? 'bg-pink-600' : '', 'absolute z-20 -bottom-px inset-x-0 h-0.5 transition ease-out duration-200']"
                                                        aria-hidden="true" />
                                                </PopoverButton>
                                            </div>

                                            <transition enter-active-class="transition ease-out duration-200"
                                                enter-from-class="opacity-0" enter-to-class="opacity-100"
                                                leave-active-class="transition ease-in duration-150"
                                                leave-from-class="opacity-100" leave-to-class="opacity-0">
                                                <PopoverPanel
                                                    class="absolute z-10 top-full inset-x-0 bg-white text-sm text-gray-500">
                                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                    <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                        aria-hidden="true" />
                                                    <!-- Fake border when menu is open -->
                                                    <div class="absolute inset-0 top-0 h-px max-w-7xl mx-auto px-8"
                                                        aria-hidden="true">
                                                        <div
                                                            :class="[open ? 'bg-gray-200' : 'bg-transparent', 'w-full h-px transition-colors ease-out duration-200']" />
                                                    </div>

                                                    <div class="relative">
                                                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                                            <div class="grid grid-cols-4 gap-y-10 gap-x-8 py-16">
                                                                <div v-for="item in category.featured" :key="item.name"
                                                                    class="group relative">
                                                                    <div
                                                                        class="aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                                                        <img :src="item.imageSrc" :alt="item.imageAlt"
                                                                            class="object-center object-cover" />
                                                                    </div>
                                                                    <a :href="item.href"
                                                                        class="mt-4 block font-medium text-gray-900">
                                                                        <span class="absolute z-10 inset-0"
                                                                            aria-hidden="true" />
                                                                        {{ item.name }}
                                                                    </a>
                                                                    <p aria-hidden="true" class="mt-1">Shop now</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </PopoverPanel>
                                            </transition>
                                        </Popover>

                                        <a v-for="page in navigation.pages" :key="page.name" :href="page.href"
                                            class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{
                                            page.name }}</a>
                                    </div>
                                </PopoverGroup>
                            </div>

                            <!-- Mobile menu and search (lg-) -->
                            <div class="flex-1 flex items-center lg:hidden">
                                <button type="button" class="-ml-2 bg-white p-2 rounded-md text-gray-400"
                                    @click="open = true">
                                    <span class="sr-only">Open menu</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>

                                <!-- Search -->
                                <Link :href="route('search')" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Search</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                </Link>
                            </div>

                            <!-- Logo (lg-) -->
                            <Link href="/" class="lg:hidden">
                            <span class="sr-only">Shopwise</span>
                            <img src="https://raw.githubusercontent.com/tchombou/shopwise/main/public/logo.png" alt=""
                                class="h-8 w-auto" />
                            </Link>

                            <div class="flex-1 flex items-center justify-end">
                                <Link :href="route('search')"
                                    class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">
                                Search </Link>

                                <div class="flex items-center lg:ml-8">
                                    <a href="#"
                                        class="hidden text-sm font-medium text-gray-700 hover:text-gray-800 lg:block">Help</a>

                                    <!-- Cart -->
                                    <div class="ml-4 flow-root lg:ml-8">
                                        <Link :href="route('cart')" class="group -m-2 p-2 flex items-center">

                                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>

                                        <span
                                            class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{
                                            $page.props.cart}}</span>
                                        <span class="sr-only">items in cart, view bag</span>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <slot />
        </main>

        <footer aria-labelledby="footer-heading" class="bg-gray-50">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="border-t border-gray-100 py-10 text-center">
                    <p class="text-sm text-gray-500">&copy; 2022 Shopwise, Inc. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</template>
