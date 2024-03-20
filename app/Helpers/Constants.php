<?php

namespace App\Helpers;

use ReflectionClass;

class Constants
{
    const DISCOUNT_TYPE_PERCENTAGE = 'percentage';
    const DISCOUNT_TYPE_VALUE = 'value';


    protected $constants;

    public function __construct()
    {
        $this->constants = collect((new ReflectionClass($this))->getConstants());
    }

    public static function getDiscountTypeText(): array
    {
        return [
            self::DISCOUNT_TYPE_PERCENTAGE => __('labels.percentage'),
            self::DISCOUNT_TYPE_VALUE => __('labels.value')
        ];
    }
}
