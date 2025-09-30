<div x-show="open" x-on:building-upgrade-started.window="open = false"
    class="fixed z-20 inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title"
    role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900 dark:bg-black opacity-50 transition-opacity z-10" aria-hidden="true" @click="open = false"></div>
    <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl shadow-gray-400 dark:shadow-black transform transition-all sm:align-middle sm:max-w-lg sm:w-full z-30"
        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <h4 class="text-lg font-bold text-gray-900 dark:text-white" id="modal-headline">
                {{ ucfirst($building->type) }}
            </h4>
            <img class="rounded-xl w-56 sm:w-80" src="{{ asset('img/'. Str::snake($building->type) .'.webp') }}"
                alt="{{ $building->type }} image">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="col-span-1">
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Level: {{ $building->level }}
                    </p>
                    {{-- @if ($building['resourceGenerationType'])
                    <p class="text-sm text-gray-700">
                        {{ ucfirst($building['resourceGenerationType']) }} production per hour: {{
                        Auth::user()->activeOutpost->{$building['resourceGenerationType'].'_per_hour'} }}
                    </p>
                    @endif --}}
                </div>
                <div class="col-span-1">
                    <table>
                        <tr>
                            <td class="align-text-top">
                                <span class="text-sm text-gray-700 dark:text-gray-300">
                                    Upgrade Cost:
                                </span>
                            </td>
                            <td class="flex flex-col">
                                {{-- <span class="text-sm text-gray-700">
                                    🪵 {{ $building['woodCost'] }}
                                </span>
                                <span class="text-sm text-gray-700">
                                    🪨 {{ $building['stoneCost'] }}
                                </span>
                                <span class="text-sm text-gray-700">
                                    🪙 {{ $building['goldCost'] }}
                                </span> --}}
                            </td>
                        </tr>
                    </table>
                    {{-- <p class="text-sm text-gray-700">
                        Upgrade Time: {{ CarbonInterval::seconds($building['buildTime'])->cascade()->forHumans() }}
                    </p>
                    @if ($building['resourceGenerationType'])
                    <p class="text-sm text-gray-700">
                        Production Improvement: {{ $building['resourceGenerationPerHourNextLevel'] }}
                    </p>
                    @endif --}}
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row sm:justify-end">
            <button type="button" wire:click="upgradeBuilding"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-emerald-300 dark:bg-emerald-600 text-base font-medium text-gray-700 dark:text-white hover:bg-emerald-400 dark:hover:bg-emerald-700 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Upgrade
            </button>
            <button type="button" @click="open = false"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Close
            </button>
        </div>
    </div>
</div>
