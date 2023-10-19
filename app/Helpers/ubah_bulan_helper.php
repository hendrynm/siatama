<?php

if (!function_exists('ubah_bulan')) {
    function ubah_bulan($tanggal): ?string
    {
        return IntlDateFormatter::create(
            'id_ID',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN,
            'MMMM yyyy'
        )->format(new DateTime($tanggal));
    }
}