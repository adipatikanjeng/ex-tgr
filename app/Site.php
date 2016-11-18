<?php

namespace App;

use App\Models\Branch\Coverage;
use App\Models\Contract;
use App\Models\Contract\Product as ContractProduct;
use App\Models\Order;
use App\Models\Order\Partial;
use App\Models\Product;
use App\Models\Product\Discount as ProductDiscount;
use App\Models\Product\Pricelist;
use App\Models\Product\Pricelist\Setting as PricelistSetting;
use App\Models\RangeDiscount;
use App\Models\Shipping\Fee;
use App\Models\WeightClass;
use \Webarq\Site\Models\Setting;
use App\Models\Contract\GroupProduct;

class Site {
    public static function money($amount, $symbol = 'Rp. ', $separator = '.', $decimal = 2) {
        return $symbol . number_format($amount, $decimal, ',', $separator);
    }

    public static function orderNumber() {
        $model = Order::orderBy('id', 'desc')->first();
        $lastInvoiceNo = ($model) ? intval( substr($model->order_number, 0, 6) ) : null;
        $newInvoiceNo = ($lastInvoiceNo) ? (string) ++$lastInvoiceNo : '1';
        while (strlen($newInvoiceNo) < 6) {
            $newInvoiceNo = '0' . $newInvoiceNo;
        }
        return $newInvoiceNo.'-ODR-'.date('m').'-'.date('Y');
    }

    public static function orderNumberPartial() {
        $model = Partial::orderBy('id', 'desc')->first();
        $lastInvoiceNo = ($model) ? intval(substr($model->order_number, 2)) : null;
        $newInvoiceNo = ($lastInvoiceNo) ? (string) ++$lastInvoiceNo : '1';
        while (strlen($newInvoiceNo) < 6) {
            $newInvoiceNo = '0' . $newInvoiceNo;
        }

        return Setting::ofCodeType('order-number', 'prefix')->value . $newInvoiceNo;
    }

    public static function contractNumber() {
        $model = Contract::orderBy('id', 'desc')->first();
        $lastInvoiceNo = ($model) ? intval(substr($model->contract_number, 2)) : null;
        $newInvoiceNo = ($lastInvoiceNo) ? (string) ++$lastInvoiceNo : '1';
        while (strlen($newInvoiceNo) < 6) {
            $newInvoiceNo = '0' . $newInvoiceNo;
        }

        return Setting::ofCodeType('kp-number', 'prefix')->value . $newInvoiceNo;
    }

    public static function daysBetween($s, $e) {
        $s = strtotime($s);
        $e = strtotime($e);

        return intval(abs($e - $s) / (24 * 3600));
    }

    public static function yearLists() {
        return array_combine(range(date("Y"), 1910), range(date("Y"), 1910));
    }

    public static function savedContractProduct($contractId, $id) {
        $contractProduct = ContractProduct::where('contract_id', $contractId)->where('product_id', $id)->first();

        return $contractProduct;
    }

    public static function savedContractGroupProductPricelist($contractId, $code) {
        $contractGroupProduct = GroupProduct::where('contract_id', $contractId)
        ->where('group_pricelist_code', $code)->first();

        return $contractGroupProduct;
    }

    public static function lang($row, $fieldName) {
        $locale = \App::getLocale();
        return $row->{$fieldName . '_locale_' . $locale};
    }

    public static function gender($code) {
        if (\App::getLocale() == 'id') {
            $code = ($code == 'Male') ? 'Laki-laki' : 'Perempuan';
        }

        return $code;
    }

    public static function monthList($productId) {
        $productCode = Product::find($productId)->code;
        $monthList = Pricelist::where('product_code', $productCode)->lists('installment_number', 'id');
        return $monthList;
    }

    public static function checkHasPricelist($productId) {
        $productCode = Product::find($productId)->code;
        return (Pricelist::where('product_code', $productCode)->first()) ? true : false;
    }

    public static function dataPricelist($productId) {
        $productCode = Product::find($productId)->code;
        return (Pricelist::where('product_code', $productCode)->first());
    }

    public static function shippingFee($cityId, $productWeight, $productVolume) {

        $coverageArea = Coverage::where('city_id', $cityId)->first();

        if (!$coverageArea) {
            $fee = Fee::where('city_id', $cityId)->first();
            if($fee){
                $weightClassCost = ceil($productWeight/1000) * $fee->cost;
                $volumeClassCost = ceil($productVolume/100) * $fee->cost;
                $defaultCost = $fee->cost;
                $cost = collect([$weightClassCost, $volumeClassCost, $defaultCost])->max();
            }else{
                $cost = 0;
            }
        } else {
            $cost = 0;
        }
        return $cost;
    }

    public static function discount($productId, $code) {
        $productCode = Product::find($productId)->code;
        $productDiscount = ProductDiscount::where('code', $code)->where('product_code', $productCode)->first();
        return ($productDiscount) ?: [];
    }

    public static function filterByTypeCredit($paymentType, $model) {
        switch ($paymentType) {
            case 'Cash':
            $model->where('installment_number', 0);
            break;
            case 'Credit':
            $model->where('installment_number', '!=', 0);
            break;
            case 'COD':
            $model;
            break;

            default:
                # code...
            break;
        }
    }

    public static function discountHeader($discountCode) {
        $rangeDiscounts = RangeDiscount::where('code', $discountCode)->first();
        return ($rangeDiscounts) ? $rangeDiscounts : 0;
    }

    public static function pricelist($productId) {
        $productCode = Product::find($productId)->code;
        $pricelistSetting = PricelistSetting::where('start_date', '<=', date('Y-m-d'))
        ->where('end_date', '>=', date('Y-m-d'))->first();
        $pricelist = null;
        if($pricelistSetting){
            $pricelist = Pricelist::where('code', $pricelistSetting->pricelist_code)->where('installment_number', 0)
            ->where('product_code', $productCode)->first();
        }

        return ($pricelist) ? $pricelist : null;
    }

}
