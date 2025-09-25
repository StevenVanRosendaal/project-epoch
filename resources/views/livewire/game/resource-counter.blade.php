<div x-data="resourceCounter()" x-init="init()">
    {{-- <div>Wood: <span x-text="wood.toFixed(2)" :class="woodColor"></span></div>
    <div>Stone: <span x-text="stone.toFixed(2)" :class="stoneColor"></span></div>
    <div>Gold: <span x-text="gold.toFixed(2)" :class="goldColor"></span></div> --}}

    <div class="flex flex-row h-20 sm:h-auto sm:-my-px sm:ml-10 sm:items-center justify-evenly pt-2 fixed inset-x-0 bottom-0 bg-white shadow-md sm:relative sm:bg-transparent sm:shadow-none">
        <div class="px-2">
            <div class="flex flex-col items-center">
                <span class="text-4xl">🪵</span>
                <span class="text-center text-3xl sm:text-5xl" x-text="Math.floor(wood)" :class="woodColor"></span>
            </div>
        </div>
        <div class="px-2">
            <div class="flex flex-col items-center">
                <span class="text-4xl">🪨</span>
                <span class="text-center text-3xl sm:text-5xl" x-text="Math.floor(stone)" :class="stoneColor"></span>
            </div>
        </div>
        <div class="px-2">
            <div class="flex flex-col items-center">
                <span class="text-4xl">🪙</span>
                <span class="text-center text-3xl sm:text-5xl" x-text="Math.floor(gold)" :class="goldColor"></span>
            </div>
        </div>
        <div class="px-2">
            <div class="flex flex-col items-center">
                <span class="text-4xl">💎</span>
                <span class="text-center text-3xl sm:text-5xl">0</span>
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

        /**
         * Get the appropriate Tailwind CSS color class based on resource percentage
         * @param {number} current - Current resource amount
         * @param {number} limit - Maximum resource limit
         * @returns {string} Tailwind CSS color class
         */
        getResourceColor(current, limit) {
            const percentage = (current / limit) * 100;
            if (current >= limit) return 'text-red-500';
            if (percentage >= 90) return 'text-orange-500';
            return 'text-white';
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
