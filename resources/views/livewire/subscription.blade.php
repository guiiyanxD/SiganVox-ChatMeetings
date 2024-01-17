<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">SignaVox: Dando Voz
                    a la Comunicación Silenciosa</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Transformando Gestos en Palabras:
                    Donde la Comunicación No Conoce Barreras</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->

                {{-- Plan Mensual --}}
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Mensual</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Adquiere el Plan Mensual y
                        conecta con las personas</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">30 Bs</span>
                        <span class="text-gray-500 dark:text-gray-400" dark:text-gray-400>/Mensual</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Traductor Web</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>App Traductor Movil</span>
                        </li>
                    </ul>
                    @if (auth()->user()->subscribedToPrice('price_1OZPSTEuJzq9ByZI2bXeG5kO', 'SignaVox'))
                        {{-- Suscrito --}}

                        @if (auth()->user()->subscription('SignaVox')->onGraceperiod())
                            <x-secondary-button wire:click="resumeSubscription" wire:target="resumeSubscription"
                                wire:loading.attr="disabled">
                                <x-spinner size="4" wire:target="resumeSubscription" wire:loading />
                                Reanudar
                            </x-secondary-button>
                        @else
                            <x-danger-button wire:click="cancelSubscription" wire:target="cancelSubscription"
                                wire:loading.attr="disabled">

                                <x-spinner size="4" wire:target="cancelSubscription" wire:loading />

                                Cancelar
                            </x-danger-button>
                        @endif
                    @else
                        <x-button class="mt-auto" wire:click="newSubscription('price_1OZPSTEuJzq9ByZI2bXeG5kO')"
                            wire:target="newSubscription('price_1OZPSTEuJzq9ByZI2bXeG5kO')"
                            wire:loading.attr="disabled">
                            <x-spinner size="4" wire:target="newSubscription('price_1OZPSTEuJzq9ByZI2bXeG5kO')"
                                wire:loading />
                            Suscribirse
                        </x-button>
                    @endif
                </div>


                {{-- PLAN Trimestral --}}
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Trimestral</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Adquiere el Plan Trimestral y
                        conecta con las personas</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">75 Bs</span>
                        <span class="text-gray-500 dark:text-gray-400" dark:text-gray-400>/Trimestral</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Traductor Web</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>App Traductor Movil</span>
                        </li>
                    </ul>
                    @if (auth()->user()->subscribedToPrice('price_1OZPSTEuJzq9ByZI5LoQPxz2', 'SignaVox'))
                        {{-- Suscrito --}}

                        @if (auth()->user()->subscription('SignaVox')->onGraceperiod())
                            <x-secondary-button wire:click="resumeSubscription" wire:target="resumeSubscription"
                                wire:loading.attr="disabled">
                                <x-spinner size="4" wire:target="resumeSubscription" wire:loading />
                                Reanudar
                            </x-secondary-button>
                        @else
                            <x-danger-button wire:click="cancelSubscription" wire:target="cancelSubscription"
                                wire:loading.attr="disabled">

                                <x-spinner size="4" wire:target="cancelSubscription" wire:loading />

                                Cancelar
                            </x-danger-button>
                        @endif
                    @else
                        <x-button class="mt-auto" wire:click="newSubscription('price_1OZPSTEuJzq9ByZI5LoQPxz2')"
                            wire:target="newSubscription('price_1OZPSTEuJzq9ByZI5LoQPxz2')"
                            wire:loading.attr="disabled">
                            <x-spinner size="4" wire:target="newSubscription('price_1OZPSTEuJzq9ByZI5LoQPxz2')"
                                wire:loading />
                            Suscribirse
                        </x-button>
                    @endif
                </div>

                {{-- PLAN Anual --}}
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Anual</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Adquiere el Plan Anual y conecta
                        con las personas</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">320 Bs</span>
                        <span class="text-gray-500 dark:text-gray-400">/Anual</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Traductor Web</span>
                        </li>

                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>App Traductor Movil</span>
                        </li>
                    </ul>
                    @if (auth()->user()->subscribedToPrice('price_1OZPSTEuJzq9ByZIGpeCI1X6', 'SignaVox'))
                        {{-- Suscrito --}}

                        @if (auth()->user()->subscription('SignaVox')->onGraceperiod())
                            <x-secondary-button wire:click="resumeSubscription" wire:target="resumeSubscription"
                                wire:loading.attr="disabled">
                                <x-spinner size="4" wire:target="resumeSubscription" wire:loading />
                                Reanudar
                            </x-secondary-button>
                        @else
                            <x-danger-button wire:click="cancelSubscription" wire:target="cancelSubscription"
                                wire:loading.attr="disabled">

                                <x-spinner size="4" wire:target="cancelSubscription" wire:loading />

                                Cancelar
                            </x-danger-button>
                        @endif
                    @else
                        <x-button class="mt-auto" wire:click="newSubscription('price_1OZPSTEuJzq9ByZIGpeCI1X6')"
                            wire:target="newSubscription('price_1OZPSTEuJzq9ByZIGpeCI1X6')"
                            wire:loading.attr="disabled">

                            <x-spinner size="4" wire:target="newSubscription('price_1OZPSTEuJzq9ByZIGpeCI1X6')"
                                wire:loading />
                            Suscribirse
                        </x-button>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 relative" role="alert">
            {{ session('error') }}
            <button class="absolute top-0 right-0 -mt-2 -mr-2 p-2" onclick="this.parentElement.style.display='none'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

</div>
