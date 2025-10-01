@props([
'name',
'icon',
'value',
'colorScheme',
'isStatic' => false
])

@php
$colorSchemes = [
'amber' => [
'bg' => 'bg-amber-50 dark:bg-amber-900/20',
'border' => 'border-amber-200 dark:border-amber-800/50',
'iconBg' => 'bg-amber-100 dark:bg-amber-800/50',
'text' => 'text-amber-700 dark:text-amber-300',
'valueText' => 'text-amber-900 dark:text-amber-100'
],
'gray' => [
'bg' => 'bg-gray-50 dark:bg-gray-700/20',
'border' => 'border-gray-300 dark:border-gray-600/50',
'iconBg' => 'bg-gray-200 dark:bg-gray-600/50',
'text' => 'text-gray-700 dark:text-gray-300',
'valueText' => 'text-gray-900 dark:text-gray-100'
],
'yellow' => [
'bg' => 'bg-yellow-50 dark:bg-yellow-900/20',
'border' => 'border-yellow-200 dark:border-yellow-800/50',
'iconBg' => 'bg-yellow-100 dark:bg-yellow-800/50',
'text' => 'text-yellow-700 dark:text-yellow-300',
'valueText' => 'text-yellow-900 dark:text-yellow-100'
],
'purple' => [
'bg' => 'bg-purple-50 dark:bg-purple-900/20',
'border' => 'border-purple-200 dark:border-purple-800/50',
'iconBg' => 'bg-purple-100 dark:bg-purple-800/50',
'text' => 'text-purple-700 dark:text-purple-300',
'valueText' => 'text-purple-900 dark:text-purple-100'
]
];

$colors = $colorSchemes[$colorScheme];
$resourceId = strtolower($name);
@endphp

@if($isStatic)
<div class="flex items-center {{ $colors['bg'] }} rounded-lg px-2 py-2 sm:px-3 sm:py-2 border {{ $colors['border'] }} flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
@click="showTooltip('{{ $resourceId }}', {{ $value }})"
@mouseenter="showTooltip('{{ $resourceId }}', {{ $value }})"
@mouseleave="hideTooltip()">
@else
<div class="flex items-center {{ $colors['bg'] }} rounded-lg px-2 py-2 sm:px-3 sm:py-2 border {{ $colors['border'] }} flex-1 sm:flex-none min-w-20 sm:min-w-0 cursor-help"
@click="showTooltip('{{ $resourceId }}', Math.floor({{ $resourceId }}))"
@mouseenter="showTooltip('{{ $resourceId }}', Math.floor({{ $resourceId }}))"
@mouseleave="hideTooltip()">
@endif
<div class="flex items-center space-x-1 sm:space-x-2 w-full">
    <div class="w-6 h-6 sm:w-8 sm:h-8 {{ $colors['iconBg'] }} rounded-full flex items-center justify-center flex-shrink-0">
        <span class="text-sm sm:text-lg">{{ $icon }}</span>
    </div>
    <div class="min-w-0 flex-1">
        <div class="text-xs font-medium {{ $colors['text'] }} uppercase tracking-wide leading-tight">{{ $name }}</div>
        <div class="relative group">
            @if($isStatic)
            <div class="text-sm sm:text-lg font-bold {{ $colors['valueText'] }} truncate leading-tight"
            x-text="abbreviateNumber({{ $value }})"></div>
            @else
            <div class="text-sm sm:text-lg font-bold {{ $colors['valueText'] }} truncate leading-tight"
            x-text="abbreviateNumber(Math.floor({{ $resourceId }}))"
            :class="{{ $resourceId }}Color"></div>
            @endif
            <!-- Tooltip -->
            <div x-show="tooltipVisible && activeTooltip === '{{ $resourceId }}'"
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
