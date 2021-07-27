<?php


namespace App\Traits\Common\Models\User;


trait Userable
{
    /**
     * @return string|null
     */
    public function getCurrencyAttribute(): ?string
    {
        $currencies = config('select_data.currencies');
        $key = array_search($this->currency_id, array_column($currencies, 'id'));

        return $currencies[$key]['name'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTimezoneAttribute(): ?string
    {
        $timezones = config('select_data.timezones');
        $key = array_search($this->timezone_id, array_column($timezones, 'id'));

        return $timezones[$key]['name'] ?? null;
    }
}
