<div x-data="resourceCounter()" x-init="init()">
    {{-- <div>Wood: <span x-text="wood.toFixed(2)" :class="woodColor"></span></div>
    <div>Stone: <span x-text="stone.toFixed(2)" :class="stoneColor"></span></div>
    <div>Gold: <span x-text="gold.toFixed(2)" :class="goldColor"></span></div> --}}

    <div class="flex flex-row h-auto items-center justify-center sm:justify-start gap-1 sm:gap-8 py-4 px-2 sm:px-6 lg:px-8 fixed inset-x-0 bottom-0 bg-white dark:bg-gray-800 shadow-xl shadow-gray-400 dark:shadow-gray-800 border-t border-gray-200 dark:border-gray-700 z-50 sm:relative sm:border-t-0 sm:border-b sm:border-b-gray-200 sm:dark:border-b-gray-700 pb-safe-bottom">
        <!-- Wood Resource -->
        <div class="flex items-center bg-amber-50 dark:bg-amber-900/20 rounded-lg px-2 py-2 sm:px-3 sm:py-2 border border-amber-200 dark:border-amber-800/50 flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
             @click="showTooltip('wood', Math.floor(wood))"
             @mouseenter="showTooltip('wood', Math.floor(wood))"
             @mouseleave="hideTooltip()">
            <div class="flex items-center space-x-1 sm:space-x-2 w-full">
                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-amber-100 dark:bg-amber-800/50 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-sm sm:text-lg">🪵</span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-xs font-medium text-amber-700 dark:text-amber-300 uppercase tracking-wide leading-tight">Wood</div>
                    <div class="relative group">
                        <div class="text-sm sm:text-lg font-bold text-amber-900 dark:text-amber-100 truncate leading-tight"
                             x-text="abbreviateNumber(Math.floor(wood))"
                             :class="woodColor"></div>
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible && activeTooltip === 'wood'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-90"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-90"
                             class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded shadow-lg whitespace-nowrap z-50"
                             x-text="tooltipValue?.toLocaleString()"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stone Resource -->
                <!-- Stone Resource -->
        <div class="flex items-center bg-gray-50 dark:bg-gray-700/20 rounded-lg px-2 py-2 sm:px-3 sm:py-2 border border-gray-300 dark:border-gray-600/50 flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
             @click="showTooltip('stone', Math.floor(stone))"
             @mouseenter="showTooltip('stone', Math.floor(stone))"
             @mouseleave="hideTooltip()">
            <div class="flex items-center space-x-1 sm:space-x-2 w-full">
                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-gray-200 dark:bg-gray-600/50 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-sm sm:text-lg">🪨</span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wide leading-tight">Stone</div>
                    <div class="relative group">
                        <div class="text-sm sm:text-lg font-bold text-gray-900 dark:text-gray-100 truncate leading-tight"
                             x-text="abbreviateNumber(Math.floor(stone))"
                             :class="stoneColor"></div>
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible && activeTooltip === 'stone'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-90"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-90"
                             class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded shadow-lg whitespace-nowrap z-50"
                             x-text="tooltipValue?.toLocaleString()"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gold Resource -->
        <div class="flex items-center bg-yellow-50 dark:bg-yellow-900/20 rounded-lg px-2 py-2 sm:px-3 sm:py-2 border border-yellow-200 dark:border-yellow-800/50 flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
             @click="showTooltip('gold', Math.floor(gold))"
             @mouseenter="showTooltip('gold', Math.floor(gold))"
             @mouseleave="hideTooltip()">
            <div class="flex items-center space-x-1 sm:space-x-2 w-full">
                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-yellow-100 dark:bg-yellow-800/50 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-sm sm:text-lg">🪙</span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-xs font-medium text-yellow-700 dark:text-yellow-300 uppercase tracking-wide leading-tight">Gold</div>
                    <div class="relative group">
                        <div class="text-sm sm:text-lg font-bold text-yellow-900 dark:text-yellow-100 truncate leading-tight"
                             x-text="abbreviateNumber(Math.floor(gold))"
                             :class="goldColor"></div>
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible && activeTooltip === 'gold'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-90"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-90"
                             class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded shadow-lg whitespace-nowrap z-50"
                             x-text="tooltipValue?.toLocaleString()"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gems Resource -->
        <div class="flex items-center bg-purple-50 dark:bg-purple-900/20 rounded-lg px-2 py-2 sm:px-3 sm:py-2 border border-purple-200 dark:border-purple-800/50 flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
             @click="showTooltip('gems', {{ Auth::user()->gems }})"
             @mouseenter="showTooltip('gems', {{ Auth::user()->gems }})"
             @mouseleave="hideTooltip()">
            <div class="flex items-center space-x-1 sm:space-x-2 w-full">
                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-purple-100 dark:bg-purple-800/50 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-sm sm:text-lg">💎</span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="text-xs font-medium text-purple-700 dark:text-purple-300 uppercase tracking-wide leading-tight">Gems</div>
                    <div class="relative group">
                        <div class="text-sm sm:text-lg font-bold text-purple-900 dark:text-purple-100 truncate leading-tight"
                             x-text="abbreviateNumber({{ Auth::user()->gems }})"></div>
                        <!-- Tooltip -->
                        <div x-show="tooltipVisible && activeTooltip === 'gems'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-90"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-90"
                             class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded shadow-lg whitespace-nowrap z-50"
                             x-text="tooltipValue?.toLocaleString()"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
 * Alpine.js component for real-time resource tracking in the outpost dashboard.
 * Handles resource accumulation with production rates and maintains accuracy
 * even when the browser tab is inactive or suspended.
 */
function resourceCounter() {
    return {
        // Current resource amounts loaded from the outpost data
        wood: Number(@json($outpost->wood) || 0),
        stone: Number(@json($outpost->stone) || 0),
        gold: Number(@json($outpost->gold) || 0),

        // Production rates per hour from building configurations
        woodRate: Number(@json(config('buildings.sawmill.production.wood')) || 0),
        stoneRate: Number(@json(config('buildings.quarry.production.stone')) || 0),
        goldRate: Number(@json(config('buildings.goldmine.production.gold')) || 0),

        // Maximum resource limits from building configurations
        woodLimit: Number(@json(config('buildings.lumber_camp.effect.wood_limit')) || 0),
        stoneLimit: Number(@json(config('buildings.mining_camp.effect.stone_limit')) || 0),
        goldLimit: Number(@json(config('buildings.treasury.effect.gold_limit')) || 0),

        // Server timestamp of the last resource calculation (Unix timestamp)
        lastTick: Number(@json(\Carbon\Carbon::parse($outpost->last_tick)->timestamp) || Math.floor(Date.now() / 1000)),

        // Client-side timestamp for tracking elapsed time between updates
        lastUpdate: Date.now(),

        // Tooltip state
        tooltipVisible: false,
        tooltipValue: null,
        activeTooltip: null,

        /**
         * Abbreviate large numbers (1000 -> 1k, 1000000 -> 1M, etc.)
         * @param {number} num - The number to abbreviate
         * @returns {string} Abbreviated number string
         */
        abbreviateNumber(num) {
            if (num < 1000) return num.toString();
            if (num < 1000000) return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'k';
            if (num < 1000000000) return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
            if (num < 1000000000000) return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'B';
            return (num / 1000000000000).toFixed(1).replace(/\.0$/, '') + 'T';
        },

        /**
         * Show tooltip with full number value
         * @param {string} resourceType - The type of resource (wood, stone, gold, gems)
         * @param {number} value - The full number value to display
         */
        showTooltip(resourceType, value) {
            // Only show tooltip if the abbreviated version is different from the full number
            if (this.abbreviateNumber(value) !== value.toString()) {
                this.tooltipVisible = true;
                this.tooltipValue = value;
                this.activeTooltip = resourceType;
            }
        },

        /**
         * Hide the tooltip
         */
        hideTooltip() {
            this.tooltipVisible = false;
            this.tooltipValue = null;
            this.activeTooltip = null;
        },

        /**
         * Get the appropriate Tailwind CSS color class based on resource percentage
         * @param {number} current - Current resource amount
         * @param {number} limit - Maximum resource limit
         * @returns {string} Tailwind CSS color class
         */
        getResourceColor(current, limit) {
            const percentage = (current / limit) * 100;
            if (current >= limit) return '!text-red-600 dark:!text-red-400';
            if (percentage >= 90) return '!text-orange-600 dark:!text-orange-400';
            return ''; // Uses default themed colors
        },

        // Computed properties for resource colors using the helper function
        get woodColor() {
            return this.getResourceColor(this.wood, this.woodLimit);
        },

        get stoneColor() {
            return this.getResourceColor(this.stone, this.stoneLimit);
        },

        get goldColor() {
            return this.getResourceColor(this.gold, this.goldLimit);
        },

        init() {
            // Calculate and apply resources accumulated since the last server tick
            const now = Math.floor(Date.now() / 1000);
            let elapsed = now - this.lastTick;

            // Add accumulated resources based on elapsed time (rates are per hour, so divide by 3600 seconds)
            // Cap resources at their respective limits
            this.wood = Math.min(this.wood + this.woodRate * (elapsed / 3600), this.woodLimit);
            this.stone = Math.min(this.stone + this.stoneRate * (elapsed / 3600), this.stoneLimit);
            this.gold = Math.min(this.gold + this.goldRate * (elapsed / 3600), this.goldLimit);
            this.lastUpdate = Date.now();

            // Start real-time resource accumulation timer (runs every second)
            setInterval(() => {
                const now = Date.now();
                let elapsedSeconds = (now - this.lastUpdate) / 1000;

                // Accumulate resources based on actual elapsed time since last update
                // Cap resources at their respective limits
                this.wood = Math.min(this.wood + this.woodRate * (elapsedSeconds / 3600), this.woodLimit);
                this.stone = Math.min(this.stone + this.stoneRate * (elapsedSeconds / 3600), this.stoneLimit);
                this.gold = Math.min(this.gold + this.goldRate * (elapsedSeconds / 3600), this.goldLimit);
                this.lastUpdate = now;
            }, 1000);

            // Handle tab inactivity: catch up resources when tab regains focus
            window.addEventListener('focus', () => {
                const now = Date.now();
                let elapsedSeconds = (now - this.lastUpdate) / 1000;

                // Only catch up if more than 1 second has passed (avoids micro-adjustments)
                if (elapsedSeconds > 1) {
                    // Cap resources at their respective limits
                    this.wood = Math.min(this.wood + this.woodRate * (elapsedSeconds / 3600), this.woodLimit);
                    this.stone = Math.min(this.stone + this.stoneRate * (elapsedSeconds / 3600), this.stoneLimit);
                    this.gold = Math.min(this.gold + this.goldRate * (elapsedSeconds / 3600), this.goldLimit);
                    this.lastUpdate = now;
                }
            });
        }
    }
}
</script>
