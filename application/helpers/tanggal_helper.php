<?php

/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 * @param int nomer bulan, Date('m')
 * @return string nama bulan dalam bahasa indonesia
 */
if (!function_exists('bulan')) {
    function bulan()
    {
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "01";
                break;
            case 2:
                $bulan = "02";
                break;
            case 3:
                $bulan = "03";
                break;
            case 4:
                $bulan = "04";
                break;
            case 5:
                $bulan = "05";
                break;
            case 6:
                $bulan = "06";
                break;
            case 7:
                $bulan = "07";
                break;
            case 8:
                $bulan = "08";
                break;
            case 9:
                $bulan = "09";
                break;
            case 10:
                $bulan = "10";
                break;
            case 11:
                $bulan = "11";
                break;
            case 12:
                $bulan = "12";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

/**
 * Fungsi untuk membuat tanggal dalam format bahasa indonesia
 * @param void
 * @return string format tanggal sekarang (contoh: 22 Desember 2016)
 */
if (!function_exists('tanggal')) {
    function tanggal()
    {
        $tanggal = Date('d') . "/" . bulan() . "/" . Date('Y');
        return $tanggal;
    }
}
