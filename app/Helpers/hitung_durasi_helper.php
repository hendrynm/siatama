<?php

if (!function_exists('hitung_durasi')) {
    function hitung_durasi($waktu_awal, $waktu_akhir): ?string
    {
        $awal = strtotime($waktu_awal);
        $akhir = strtotime($waktu_akhir);
        $durasi = $akhir - $awal;
        $jam = floor($durasi / (60 * 60));
        $menit = $durasi - $jam * (60 * 60);
        $menit = floor($menit / 60);
        $detik = $durasi - $jam * (60 * 60) - $menit * 60;
        
        return $jam . ' Jam ' . $menit . ' Menit';
    }
}