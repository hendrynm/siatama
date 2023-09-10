<?php

if (!function_exists('ubah_harga')) {
    function ubah_harga($harga): ?string
    {
        $mata_uang = 'Rp';
        $rupiah = number_format($harga, 0, ',', '.');
        
        return $mata_uang . $rupiah;
    }
}