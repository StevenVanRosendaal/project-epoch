<div x-data="{ open: false }" class="indicator w-auto bg-white dark:bg-gray-800 shadow-xl shadow-gray-400 dark:shadow-gray-800 lg:col-span-2 md:col-span-3 col-span-6 flex-col rounded-xl">
    <button @click="open = true">
        <div class="indicator-item badge badge-primary select-none">
            {{ $building->level }}
        </div>
        <div class="relative flex justify-end bg-contain w-full rounded-xl bg-no-repeat">
            <img class="rounded-xl {{ $imgClass  }}" src="{{ asset('img/'. Str::snake($building->type) .'.webp') }}"
                alt="{{ $building->type }}">
            <h4
                class="absolute z-10 self-start justify-self-end px-2 mt-5 text-xs xl:text-lg text-white font-bold bg-black/50">
                {{ ucfirst($building->type) }}
            </h4>
            {{-- @if($is_building)
            <div class="absolute bg-dark p-1 z-10 self-end justify-self-end w-full rounded">
                <progress class="progress progress-success border-2 h-3" value="{{ $buildTimePassedInSeconds }}"
                    max="{{ $totalBuildTimeInSeconds }}"></progress>
            </div>
            @endif --}}
        </div>
    </button>
    <livewire:game.building-modal :building="$building" />
</div>
