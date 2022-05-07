<?php

    /**
     * Laravel Helpers File
     * Extracted by SurfyApp
     * https://trafficexchangescript.net
    */

    use Carbon\Carbon;

    /**
     * Create a date range from the keys and fill them with zero
     *
     * @param  Carbon  $startDate
     * @param  Carbon  $endDate
     * @param  string  $format
     * @return array
     */
    function generateDates(Carbon $startDate, Carbon $endDate, $format = 'Y-m-d')
    {
        $dates = collect();
        $startDate = $startDate->copy();

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dates->put($date->format($format), 0);
        }

        return $dates;
    }
?>