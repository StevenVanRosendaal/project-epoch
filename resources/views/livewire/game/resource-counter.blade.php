@php
    $dynamicResources = collect(config('resources'))->except('gems');
    $staticResources = collect(config('resources'))->only('gems');
@endphp

<div x-data="resourceCounter()" x-init="init()">
    <div class="flex flex-row h-auto items-center justify-center sm:justify-start gap-1 sm:gap-8 py-4 px-2 sm:px-6 lg:px-8 fixed inset-x-0 bottom-0 bg-white dark:bg-gray-800 shadow-xl shadow-gray-400 dark:shadow-gray-800 border-t border-gray-200 dark:border-gray-700 z-50 sm:relative sm:border-t-0 sm:border-b sm:border-b-gray-200 sm:dark:border-b-gray-700 pb-safe-bottom">

        <!-- Dynamic Resources -->
        @foreach($dynamicResources as $key => $resource)
            <x-resource-card
                :name="$resource['name']"
                :icon="$resource['icon']"
                :value="$key"
                :color-scheme="$resource['color_scheme']" />
        @endforeach

        <!-- Static Resources -->
        @foreach($staticResources as $key => $resource)
            <x-resource-card
                :name="$resource['name']"
                :icon="$resource['icon']"
                :value="Auth::user()->{$key}"
                :color-scheme="$resource['color_scheme']"
                :is-static="true" />
        @endforeach

    </div>
</div>

<script>
    /**
     * Alpine.js component for real-time resource tracking in the outpost dashboard.
     * Config-driven and maintainable approach.
     */
    function resourceCounter() {
        return {
            // Merge tooltip functionality from resource-utils
            ...tooltipMixin(),

            // Resource data - dynamically loaded from config
            wood: Number(@json($outpost->wood) || 0),
            stone: Number(@json($outpost->stone) || 0),
            gold: Number(@json($outpost->gold) || 0),

            // Production rates - config driven
            woodRate: Number(@json(config('buildings.sawmill.production.wood')) || 0),
            stoneRate: Number(@json(config('buildings.quarry.production.stone')) || 0),
            goldRate: Number(@json(config('buildings.goldmine.production.gold')) || 0),

            // Resource limits - config driven
            woodLimit: Number(@json(config('buildings.lumber_camp.effect.wood_limit')) || 0),
            stoneLimit: Number(@json(config('buildings.mining_camp.effect.stone_limit')) || 0),
            goldLimit: Number(@json(config('buildings.treasury.effect.gold_limit')) || 0),

            // Timing
            lastTick: Number(@json(\Carbon\Carbon::parse($outpost->last_tick)->timestamp) || Math.floor(Date.now() / 1000)),
            lastUpdate: Date.now(),

            // Shared utilities
            abbreviateNumber: window.abbreviateNumber,
            getResourceColor: window.getResourceColor,

            // Computed color properties
            get woodColor() {
                return this.getResourceColor(this.wood, this.woodLimit);
            },

            get stoneColor() {
                return this.getResourceColor(this.stone, this.stoneLimit);
            },

            get goldColor() {
                return this.getResourceColor(this.gold, this.goldLimit);
            },

            // Clean resource update method
            updateResources(elapsedHours) {
                this.wood = Math.min(this.wood + this.woodRate * elapsedHours, this.woodLimit);
                this.stone = Math.min(this.stone + this.stoneRate * elapsedHours, this.stoneLimit);
                this.gold = Math.min(this.gold + this.goldRate * elapsedHours, this.goldLimit);
            },

            init() {
                // Calculate catch-up from server tick
                const now = Math.floor(Date.now() / 1000);
                this.updateResources((now - this.lastTick) / 3600);
                this.lastUpdate = Date.now();

                // Real-time updates
                setInterval(() => {
                    const now = Date.now();
                    const elapsedSeconds = (now - this.lastUpdate) / 1000;
                    this.updateResources(elapsedSeconds / 3600);
                    this.lastUpdate = now;
                }, 1000);

                // Tab focus catch-up
                window.addEventListener('focus', () => {
                    const now = Date.now();
                    const elapsedSeconds = (now - this.lastUpdate) / 1000;

                    if (elapsedSeconds > 1) {
                        this.updateResources(elapsedSeconds / 3600);
                        this.lastUpdate = now;
                    }
                });
            }
        }
    }
</script>
