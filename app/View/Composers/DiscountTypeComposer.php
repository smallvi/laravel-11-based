<?php

namespace App\View\Composers;

use App\Helpers\Constants;
use App\Helpers\Status;
use Illuminate\View\View;

class DiscountTypeComposer
{
    public function compose(View $view)
    {
        $view->with('discount_types', Constants::getDiscountTypeText());
    }
}
