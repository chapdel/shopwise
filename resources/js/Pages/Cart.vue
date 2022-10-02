<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <AppLayout>
        <div class="bg-white">
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-0">
                <h1 class="text-3xl font-extrabold text-center tracking-tight text-gray-900 sm:text-4xl">Cart
                </h1>

                <form @submit.prevent="checkout" class="mt-12" v-if="$page.props.cart > 0">
                    <section aria-labelledby="cart-heading">
                        <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>


                        <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                            <li v-for="product in $page.props.cart_content" :key="product.id" class="flex py-6">
                                <div class="flex-shrink-0">
                                    <img :src="product.associatedModel.media[0]?product.associatedModel.media[0].original_url: 'https://tailwindui.com/img/ecommerce-images/product-page-04-featured-product-shot.jpg'"
                                        :alt="product.imageAlt"
                                        class="w-24 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32" />
                                </div>


                                <div class="ml-4 flex-1 flex flex-col sm:ml-6">
                                    <div>
                                        <div class="flex justify-between">
                                            <h4 class="text-sm">
                                                <a :href="product.href"
                                                    class="font-medium text-gray-700 hover:text-gray-800">
                                                    {{ product.name }}
                                                </a>
                                            </h4>
                                            <p class="ml-4 text-sm font-medium text-gray-900">{{
                                            product.associatedModel.converted_price
                                            }}
                                            </p>
                                        </div>
                                        <p class="mt-1 text-lg text-gray-500">
                                            {{ product.quantity }} pc(s)
                                        </p>
                                    </div>

                                    <div class="mt-4 flex-1 flex items-end justify-between">
                                        <p class="flex items-center text-sm text-gray-700 space-x-2">

                                            <svg v-if="product.inStock" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6 text-green-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>

                                            <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="flex-shrink-0 h-5 w-5 text-gray-300">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                            </svg>

                                            <span>{{ product.inStock ? 'In stock' : `Will ship`
                                            }}</span>
                                        </p>
                                        <div class="ml-4">
                                            <button type="button" @click="remove(product.id)"
                                                class="text-sm font-medium text-pink-600 hover:text-pink-500">
                                                <span>Remove</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </section>

                    <!-- Order summary -->
                    <section aria-labelledby="summary-heading" class="mt-10">
                        <h2 id="summary-heading" class="sr-only">Order summary</h2>

                        <div>
                            <dl class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <dt class="text-base font-medium text-gray-900">Subtotal</dt>
                                    <dd class="ml-4 text-base font-medium text-gray-900">{{ $page.props.cart_total}}
                                    </dd>
                                </div>
                            </dl>
                            <p class="mt-1 text-sm text-gray-500">Shipping and taxes will be calculated at checkout.</p>
                        </div>

                        <div class="mt-10">
                            <button type="submit"
                                class="w-full bg-pink-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-pink-500">Checkout</button>
                        </div>

                        <div class="mt-6 text-sm text-center">
                            <p>
                                or
                                <Link href="/" class="text-pink-600 font-medium hover:text-pink-500">Continue
                                Shopping<span aria-hidden="true"> &rarr;</span></Link>
                            </p>
                        </div>
                    </section>
                </form>
                <div v-else class="mt-12 overflow-hidden bg-white shadow rounded-xl">
                    <div>
                        <div class="px-4 py-6 sm:px-8 sm:py-10">
                            <div class="w-full flex content-center justify-center items-center flex-col">
                                Your cart is empty
                                <Link href="/" class="nuxt-link-active"><button aria-label="White button" type="button"
                                    class="flex content-center items-center justify-center text-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500">
                                    Back to homepage
                                </button></Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
const form = useForm()
const remove = (slug) => {
    form.delete(route('cart.remove', { id: slug }))
}

const checkout = (slug) => {
    form.post(route('checkout'))
}
</script>
