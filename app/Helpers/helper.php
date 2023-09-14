<?php

use App\Models\Whislist;

if (!function_exists('cekProduk')) {
    function cekProduk($user_id, $produk_id)
    {
        $favorit = Whislist::where(['user_id' => $user_id, 'produk_id' => $produk_id])->first();
        if ($favorit) {
            return 'remove';
        } else {
            return 'favorit';
        }
    }
}
