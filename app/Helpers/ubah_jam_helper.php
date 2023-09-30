<?php

if (!function_exists('ubah_jam')) {
    function ubah_jam($waktu): ?string
    {
        return IntlDateFormatter::create(
            'id_ID',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            'HH:mm'
        )->format(new DateTime($waktu));
    }
}