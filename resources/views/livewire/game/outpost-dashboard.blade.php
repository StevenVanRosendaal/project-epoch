<div x-data="resourceCounter()" x-init="init()">
    <div>Wood: <span x-text="wood.toFixed(2)"></span></div>
    <div>Stone: <span x-text="stone.toFixed(2)"></span></div>
    <div>Gold: <span x-text="gold.toFixed(2)"></span></div>
</div>

<script>
function resourceCounter() {
    return {
        wood: Number(@json($outpost->wood) || 0),
        stone: Number(@json($outpost->stone) || 0),
        gold: Number(@json($outpost->gold) || 0),
        woodRate: Number(@json(config('buildings.sawmill.production.wood')) || 0),
        stoneRate: Number(@json(config('buildings.quarry.production.stone')) || 0),
        goldRate: Number(@json(config('buildings.goldmine.production.gold')) || 0),
        lastTick: Number(@json(\Carbon\Carbon::parse($outpost->last_tick)->timestamp) || Math.floor(Date.now() / 1000)),
        init() {
            const now = Math.floor(Date.now() / 1000);
            let elapsed = now - this.lastTick;
            this.wood += this.woodRate * (elapsed / 3600);
            this.stone += this.stoneRate * (elapsed / 3600);
            this.gold += this.goldRate * (elapsed / 3600);

            setInterval(() => {
                this.wood += this.woodRate / 3600;
                this.stone += this.stoneRate / 3600;
                this.gold += this.goldRate / 3600;
            }, 1000);
        }
    }
}
</script>
