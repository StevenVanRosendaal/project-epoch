<div class="container mx-auto pt-6 pb-24 sm:pb-4 px-4 sm:px-6 lg:px-8 grid grid-cols-12 gap-4">
    <div class="col-span-12 p-2 rounded-b-xl bg-white dark:bg-gray-800 shadow-xl shadow-gray-400 dark:shadow-gray-800">Hi</div>
    <div class="col-span-12 lg:col-span-9 rounded-xl shadow-xl shadow-gray-400 dark:shadow-gray-800">
        <div class="hero h-96 rounded-xl place-items-start justify-end"
            style="background-image: url('{{ asset('img/small_outpost.webp') }}')">
            <div class="hero-content px-0">
                <div class="max-w-md">
                    <h3 class="inline-block px-2 mb-5 text-3xl text-white font-bold bg-black/50 mt-5">
                        {{ $outpost->name }}
                    </h3>

                    <div class="flex flex-col items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-side-banner display="hidden lg:block" />
    <div class="grid grid-cols-12 gap-4 col-span-12 lg:col-span-9 bg-white dark:bg-gray-800 rounded-xl p-2 shadow-xl shadow-gray-400 dark:shadow-gray-800">
        <div class="border-b border-gray-200 dark:border-gray-700 col-span-12">
            <div role="tablist" class="tabs tabs-lifted grid-cols-12" x-data="{
                    activeTab: 0,
                    setTab: function (tab) {
                        this.activeTab = tab;
                    },
                }">
                <span role="tab" class="tab text-xs col-span-3 bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 border-b-2 border-transparent rounded-t-lg transition-all duration-200" @click="setTab(0)"
                    x-bind:class="[ (activeTab === 0 )?'tab-active !bg-white dark:!bg-gray-800 !text-gray-900 dark:!text-white !border-blue-500':'' ] ">
                    Resources
                </span>
                <span role="tab" class="tab text-xs col-span-3 bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 border-b-2 border-transparent rounded-t-lg transition-all duration-200" @click="setTab(1)"
                    x-bind:class="[ (activeTab === 1 )?'tab-active !bg-white dark:!bg-gray-800 !text-gray-900 dark:!text-white !border-blue-500':'' ] ">
                    Civic Buildings
                </span>
                <span role="tab" class="tab text-xs col-span-3 bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 border-b-2 border-transparent rounded-t-lg transition-all duration-200" @click="setTab(2)"
                    x-bind:class="[ (activeTab === 2 )?'tab-active !bg-white dark:!bg-gray-800 !text-gray-900 dark:!text-white !border-blue-500':'' ] ">
                    Military Buildings
                </span>
                <div class="tab cursor-default col-span-3 bg-transparent">
                </div>

                <div role="tabpanel" class="bg-white dark:bg-gray-800 border-base-300 rounded-box p-6 col-span-12"
                    x-show="activeTab === 0" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <div class="grid grid-cols-6 gap-4">
                        <livewire:game.building-card :building="$outpost->sawmill()" />
                        {{-- <livewire:components.structure-card :structure="$outpost->stoneQuarry()->toArray()" />
                        <livewire:components.structure-card :structure="$outpost->goldMine()->toArray()" /> --}}
                    </div>
                </div>
                <div role="tabpanel" class="bg-white dark:bg-gray-800 border-base-300 rounded-box p-6 col-span-12"
                    x-show="activeTab === 1" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <div class="grid grid-cols-12 gap-4">
                        {{--
                        <livewire:components.structure-card :structure="'library'" />
                        <livewire:components.structure-card :structure="'smithy'" />
                        <livewire:components.structure-card :structure="'temple'" />
                        <livewire:components.structure-card :structure="'wall'" />
                        <livewire:components.structure-card :structure="'tower'" /> --}}
                    </div>
                </div>
                <div role="tabpanel" class="bg-white dark:bg-gray-800 border-base-300 rounded-box p-6 col-span-12"
                    x-show="activeTab === 2" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <div class="grid grid-cols-12 gap-4">
                        {{--
                        <livewire:components.structure-card :structure="'barracks'" />
                        <livewire:components.structure-card :structure="'archery_range'" />
                        <livewire:components.structure-card :structure="'stables'" />
                        <livewire:components.structure-card :structure="'siege_workshop'" /> --}}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <x-side-banner display="lg:hidden block" />
</div>
