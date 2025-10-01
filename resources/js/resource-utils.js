/**
 * Shared utilities for resource management across components
 */

/**
 * Abbreviate large numbers (1000 -> 1k, 1000000 -> 1M, etc.)
 * @param {number} num - The number to abbreviate
 * @returns {string} Abbreviated number string
 */
function abbreviateNumber(num) {
    if (num < 1000) return num.toString();
    if (num < 1000000) return (num / 1000).toFixed(1).replace(/\.0$/, '') + 'k';
    if (num < 1000000000) return (num / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
    if (num < 1000000000000) return (num / 1000000000).toFixed(1).replace(/\.0$/, '') + 'B';
    return (num / 1000000000000).toFixed(1).replace(/\.0$/, '') + 'T';
}

/**
 * Get the appropriate Tailwind CSS color class based on resource percentage
 * @param {number} current - Current resource amount
 * @param {number} limit - Maximum resource limit
 * @returns {string} Tailwind CSS color class
 */
function getResourceColor(current, limit) {
    const percentage = (current / limit) * 100;
    if (current >= limit) return '!text-red-600 dark:!text-red-400';
    if (percentage >= 90) return '!text-orange-600 dark:!text-orange-400';
    return ''; // Uses default themed colors
}

/**
 * Tooltip management mixin for Alpine.js components
 */
function tooltipMixin() {
    return {
        tooltipVisible: false,
        tooltipValue: null,
        activeTooltip: null,

        /**
         * Show tooltip with full number value
         * @param {string} resourceType - The type of resource (wood, stone, gold, gems)
         * @param {number} value - The full number value to display
         */
        showTooltip(resourceType, value) {
            // Only show tooltip if the abbreviated version is different from the full number
            if (abbreviateNumber(value) !== value.toString()) {
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
        }
    };
}

// Make functions globally available
window.abbreviateNumber = abbreviateNumber;
window.getResourceColor = getResourceColor;
window.tooltipMixin = tooltipMixin;
