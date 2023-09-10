<?php

if (!function_exists('ubah_nomor_hp'))
{
    function ubah_nomor_hp($nomor): ?string
    {
        $panjang = strlen($nomor);
        
        switch ($panjang)
        {
            case 10:
                $nomor = substr_replace($nomor, "-", 3, 0);
                $nomor = substr_replace($nomor, "-", 8, 0);
                break;
            case 11:
                $nomor = substr_replace($nomor, "-", 4, 0);
                $nomor = substr_replace($nomor, "-", 8, 0);
                break;
            case 12:
                $nomor = substr_replace($nomor, "-", 4, 0);
                $nomor = substr_replace($nomor, "-", 9, 0);
                break;
            case 13:
                $nomor = substr_replace($nomor, "-", 4, 0);
                $nomor = substr_replace($nomor, "-", 10, 0);
                break;
        }
        
        return $nomor;
    }
}
