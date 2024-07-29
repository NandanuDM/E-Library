<?php

use Carbon\Carbon;

/**
 * Format a number into Rupiah currency format.
 *
 * @param float|int $number The number to format.
 * @param int $decimal The number of decimal points.
 * @return string Formatted currency string.
 */
if (! function_exists('formatRp')) {
    function formatRp($number, $decimal = 2)
    {
        try {
            return 'Rp ' . number_format($number, $decimal, ',', '.');
        } catch (\Exception $e) {
            // Handle exception and return a default value
            return 'Rp 0,00';
        }
    }
}

/**
 * Format a date into a specified format using Carbon.
 *
 * @param string $date The date to format.
 * @param string $format The desired date format.
 * @return string|null Formatted date string or null on failure.
 */
if (! function_exists('formatDate')) {
    function formatDate($date, $format = 'd F Y')
    {
        try {
            return Carbon::parse($date)->translatedFormat($format);
        } catch (\Exception $e) {
            // Handle exception and return null
            return null;
        }
    }
}
