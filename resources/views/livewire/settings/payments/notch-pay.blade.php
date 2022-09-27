<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-bold leading-6 text-secondary-900 dark:text-white">{{ __('Notch Pay') }}</h3>
                <p class="mt-4 text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                    {{ __('shopper::pages/settings.payment.notchpay_description') }}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="bg-white shadow rounded-md overflow-hidden dark:bg-secondary-800">
                <div class="p-4 sm:px-6 border-b border-secondary-200 dark:border-secondary-700">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div
                                class="shrink-0 w-2.5 h-2.5 rounded-full {{ $this->enabled ? 'bg-green-400' : 'bg-secondary-400 dark:bg-secondary-600' }}">
                            </div>
                            <h3 class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                                @if ($this->enabled)
                                {{ __('shopper::pages/settings.payment.notchpay_enabled') }}
                                @else
                                {{ __('shopper::pages/settings.payment.notchpay_disabled') }}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="shrink-0">

                        <svg class="h-12 w-auto"
                            viewBox="-25.902186976112972 -33.44240615806979 556.8121869761129 213.88481231613946"
                            xmlns="http://www.w3.org/2000/svg" width="2500" height="1061">
                            <path
                                d="M141.49 63.55c-.06-.91-.12-1.81-.2-2.72-.15-1.62-.31-3.25-.49-4.88a99.81 99.81 0 0 0-5.5-23.37c-3.36-9-9.26-15.35-18.2-19-9.91-4.08-20.27-5.95-30.85-6.68-4-.27-8-.43-12-.43a120.39 120.39 0 0 0-36.62 5.27C26 15.44 18 22.66 14.21 34.52a129.12 129.12 0 0 0-3.59 14.11A136.17 136.17 0 0 0 8.24 73.5a136.17 136.17 0 0 0 2.38 24.87 129.12 129.12 0 0 0 3.59 14.11C18 124.34 26 131.56 37.66 135.26a120.32 120.32 0 0 0 36.61 5.27c4 0 8-.16 12-.43 10.58-.73 20.94-2.6 30.85-6.66 8.94-3.67 14.84-10 18.2-19a99.81 99.81 0 0 0 5.5-23.37c.18-1.63.34-3.26.49-4.88.08-.91.14-1.81.2-2.72.11-1.73.36-3.45.55-5.17v-9.58c-.21-1.72-.46-3.44-.57-5.17zM113.2 76.13a24.07 24.07 0 0 1-5.2 7.64 24.58 24.58 0 0 1-7.67 5.15A23.28 23.28 0 0 1 91 90.81a16.26 16.26 0 0 1-5.32-.81 21.83 21.83 0 0 1-4.63-2.26V88l-.24 11.1a7.54 7.54 0 0 1-.45 2.61 6.49 6.49 0 0 1-1.3 2.13 5.8 5.8 0 0 1-2 1.42 6.33 6.33 0 0 1-2.54.5 6.53 6.53 0 0 1-2.56-.5 6.88 6.88 0 0 1-2.09-1.41 6.48 6.48 0 0 1-1.41-2.14 6.67 6.67 0 0 1-.46-2.65V66.77a30.25 30.25 0 0 1 .3-4.33 11.84 11.84 0 0 0-2.12-4.72 9 9 0 0 0-7.56-3.35c-3.29 0-5.82 1-7.6 3s-2.66 5.29-2.66 9.83v31.4a6.22 6.22 0 0 1-1.91 4.61 7.08 7.08 0 0 1-2.11 1.36 6.45 6.45 0 0 1-2.55.51 6.36 6.36 0 0 1-2.56-.51 7.11 7.11 0 0 1-2.09-1.36 6.17 6.17 0 0 1-1.41-2 6.37 6.37 0 0 1-.5-2.57V66.35a31 31 0 0 1 1.55-10 22.89 22.89 0 0 1 4.51-7.93 20.83 20.83 0 0 1 7.24-5.23 24.11 24.11 0 0 1 9.81-1.89 25.5 25.5 0 0 1 9.87 1.82 20.81 20.81 0 0 1 7.41 5.15 22.86 22.86 0 0 1 6.24-4.12A22.25 22.25 0 0 1 91 42.24a23.28 23.28 0 0 1 9.32 1.89 24.13 24.13 0 0 1 14.78 22.63 23.39 23.39 0 0 1-1.9 9.37z"
                                fill="#208366" />
                            <path
                                d="M113.2 57a24.35 24.35 0 0 0-12.85-12.84A23.28 23.28 0 0 0 91 42.24a22.25 22.25 0 0 0-9.21 1.89 22.86 22.86 0 0 0-6.24 4.12 20.81 20.81 0 0 0-7.41-5.15 25.5 25.5 0 0 0-9.87-1.82 24.11 24.11 0 0 0-9.81 1.89 20.83 20.83 0 0 0-7.24 5.23 22.89 22.89 0 0 0-4.51 7.93 31 31 0 0 0-1.55 10v32.29a6.37 6.37 0 0 0 .5 2.57 6.17 6.17 0 0 0 1.41 2 7.11 7.11 0 0 0 2.09 1.36 6.36 6.36 0 0 0 2.56.51 6.45 6.45 0 0 0 2.55-.51 7.08 7.08 0 0 0 2.11-1.36 6.22 6.22 0 0 0 1.91-4.61V67.22q0-6.81 2.66-9.83c1.78-2 4.31-3 7.6-3a9 9 0 0 1 7.56 3.35 11.84 11.84 0 0 1 2.12 4.72 30.25 30.25 0 0 0-.3 4.33v32.27a6.67 6.67 0 0 0 .51 2.61 6.48 6.48 0 0 0 1.41 2.14 6.88 6.88 0 0 0 2.15 1.41 6.53 6.53 0 0 0 2.56.5 6.33 6.33 0 0 0 2.54-.5 5.8 5.8 0 0 0 2-1.42 6.49 6.49 0 0 0 1.3-2.13 7.54 7.54 0 0 0 .45-2.61l.2-11.06v-.27A21.83 21.83 0 0 0 85.68 90a16.26 16.26 0 0 0 5.35.86 23.28 23.28 0 0 0 9.32-1.89 24.58 24.58 0 0 0 7.65-5.2 24.07 24.07 0 0 0 5.18-7.64 23.39 23.39 0 0 0 1.9-9.37A24.49 24.49 0 0 0 113.2 57zm-11.39 13.82a11.64 11.64 0 0 1-2.44 3.59 11.28 11.28 0 0 1-3.57 2.42 10.86 10.86 0 0 1-8.54 0 11.17 11.17 0 0 1-3.45-2.33 10.91 10.91 0 0 1-2.32-3.45 9.38 9.38 0 0 1-.44-1.22 10.81 10.81 0 0 1-.43-3 11.63 11.63 0 0 1 .27-2.48 12.78 12.78 0 0 1 .6-2 10.57 10.57 0 0 1 2.32-3.69 11.14 11.14 0 0 1 3.45-2.32 10.49 10.49 0 0 1 4.25-.87 12.12 12.12 0 0 1 4.29.77 10.94 10.94 0 0 1 3.57 2.16 9.76 9.76 0 0 1 2.44 3.6 11.48 11.48 0 0 1 .92 4.48 10.67 10.67 0 0 1-.92 4.34z"
                                fill="#fff" />
                            <g fill="#37384e">
                                <path
                                    d="M102.73 66.45a10.67 10.67 0 0 1-.92 4.37 11.64 11.64 0 0 1-2.44 3.59 11.28 11.28 0 0 1-3.57 2.42 10.86 10.86 0 0 1-8.54 0 11.17 11.17 0 0 1-3.45-2.33 10.91 10.91 0 0 1-2.32-3.45 9.38 9.38 0 0 1-.44-1.22 10.81 10.81 0 0 1-.43-3 11.63 11.63 0 0 1 .27-2.48 12.78 12.78 0 0 1 .6-2 10.57 10.57 0 0 1 2.32-3.69 11.14 11.14 0 0 1 3.45-2.32 10.49 10.49 0 0 1 4.25-.87 12.12 12.12 0 0 1 4.29.77 10.94 10.94 0 0 1 3.57 2.16 9.76 9.76 0 0 1 2.44 3.6 11.48 11.48 0 0 1 .92 4.45zM180.67 69.2l-.07 34.43h-9.75V48.42h3l33.23 35.26.07-34.36h9.75v55.21h-3zM224.56 84.35c0-10.57 7.44-20.25 20.44-20.25s20.48 9.68 20.48 20.25-7.42 20.33-20.48 20.33-20.44-9.68-20.44-20.33zm9.52 0c0 7.21 4.73 11.86 10.95 11.86s11-4.65 11-11.86-4.73-11.77-11-11.77-10.95 4.65-10.95 11.77zM285.24 65h9.68v7.65h-9.68v31h-9.52v-31h-8.18L283 53.6h2.25zM317.35 95.68a14.12 14.12 0 0 0 11.32-5.1l5 7.43c-2.85 3.07-8.18 6.52-16.43 6.52-12.22 0-19.95-8.77-19.95-20.18s7.73-20.17 19.95-20.17c8.25 0 13.58 3.45 16.43 6.52l-5 7.43A14.12 14.12 0 0 0 317.35 73c-6.23 0-10.51 4.5-10.51 11.32s4.28 11.36 10.51 11.36zM349.3 45.87V69c1.8-2.55 5.25-4.88 11.7-4.88 9.83 0 15.23 6.9 15.23 16.8v22.73h-9.53V82c0-6.15-2.92-9.37-8.55-9.37-5.1 0-8.85 3.22-8.85 9.37v21.68h-9.53V45.87z" />
                            </g>
                            <path
                                d="M423.79 49.32c11.1 0 19 7.06 19 18.16s-7.88 18.3-19 18.3h-10.73v17.85h-9.75V49.32zm8.93 18.16c0-5.33-3.61-9.3-10.13-9.3h-9.53v18.75h9.53c6.52 0 10.13-3.93 10.13-9.45zM464.67 104.53c-10 0-18.53-7.5-18.53-20.18s8.55-20.25 18.53-20.25a16.34 16.34 0 0 1 11.78 4.65V65h9.3v38.63h-9.3V100a16.29 16.29 0 0 1-11.78 4.53zm-9.08-20.18c0 7.43 4.65 11.71 10.73 11.71 5.55 0 10.35-4.28 10.35-11.71s-4.8-11.77-10.35-11.77c-6.08 0-10.73 4.27-10.73 11.77zM530.91 65l-19.73 55.14h-9.53l5.63-16.21L490.62 65h10.21l10.72 26.71L520.78 65z"
                                fill="#208366" />
                        </svg>
                    </div>
                    <div class="mt-4">
                        <p class="text-secondary-500 text-sm leading-5 dark:text-secondary-400">
                            {{ __('shopper::pages/settings.payment.notchpay_provider') }}
                            <a href="https://github.com/notchpay/notchpay-php" target="_blank"
                                class="text-primary-600 hover:text-primary-500">{{
                                __('shopper::pages/settings.payment.notchpay_about') }}</a>
                        </p>
                        @if(! $this->enabled)
                        <span class="mt-4 inline-flex rounded-md shadow-sm">
                            <x-shopper::buttons.default wire:click="enabledStripe" wire.loading.attr="disabled"
                                type="button">
                                <x-shopper::loader wire:loading wire:target="enabledStripe"
                                    class="text-secondary-600 dark:text-secondary-300" />
                                {{ __('shopper::pages/settings.payment.notchpay_actions') }}
                            </x-shopper::buttons.default>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($this->enabled)

    <div class="hidden sm:block">
        <div class="py-5">
            <div class="border-t border-secondary-200 dark:border-secondary-700"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-bold leading-6 text-secondary-900 dark:text-white">{{
                        __('shopper::messages.environment') }}</h3>
                    <p class="mt-4 text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                        {{ __('shopper::pages/settings.payment.notchpay_environment') }}
                        {{ __('shopper::pages/settings.payment.notchpay_dashboard') }} <a
                            href="https://dashboard.stripe.com/account/apikeys" target="_blank"
                            class="text-primary-600 dark:text-primary-500/50">https://dashboard.stripe.com/account/apikeys</a>
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="shadow rounded-md overflow-hidden">
                    <div class="px-4 py-5 sm:p-6 space-y-4 bg-white dark:bg-secondary-800">
                        <div class="grid gap-4 sm:grid-cols-6 sm:gap-6">
                            <x-shopper::forms.group label="shopper::layout.forms.label.public_key" for="public_key"
                                class="sm:col-span-3">
                                <x-shopper::forms.input wire:model.lazy="notchpay_key" id="public_key" type="text"
                                    autocomplete="off" />
                            </x-shopper::forms.group>

                            <x-shopper::forms.group label="shopper::layout.forms.label.secret_key" for="secret_key"
                                class="sm:col-span-3">
                                <x-shopper::forms.input wire:model.lazy="notchpay_secret" id="secret_key" type="text" />
                            </x-shopper::forms.group>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 pt-5 border-t border-secondary-200 dark:border-secondary-700">
        <div class="flex justify-end">
            <x-shopper::buttons.primary wire:click="store" type="button" wire:loading.attr="disabled">
                <x-shopper::loader wire:loading wire:target="store" class="text-white" />
                {{ __('shopper::layout.forms.actions.update') }}
            </x-shopper::buttons.primary>
        </div>
    </div>

    @endif

</div>
