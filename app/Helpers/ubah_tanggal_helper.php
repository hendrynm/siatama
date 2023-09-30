<?php

if (!function_exists('ubah_tanggal')) {
    function ubah_tanggal($tanggal): ?string
    {
        return IntlDateFormatter::create(
            'id_ID',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            'eeee, dd MMMM yyyy'
        )->format(new DateTime($tanggal));
    }
}