<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

function __getAdmin()
{
    return Auth::guard('admin')->user();
}

function __getVendor()
{
    return Auth::guard('vendor')->user();
}

function __getPriceunit()
{
    return 'Rs';
}

function ___getPriceafterVat($total, $vat, $shipping)
{
    $vat_amount = ($vat * $total) / 100;
    $totalsum = $vat_amount + $total + $shipping;

    return $totalsum;
}

function getImageurl($path)
{
    return Storage::disk('public')->url($path);
}

function getFilePath($path)
{
    return Storage::disk('public')->url($path);
}
