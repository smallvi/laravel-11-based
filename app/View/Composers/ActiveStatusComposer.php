<?php

namespace App\View\Composers;

use App\Helpers\Status;
use Illuminate\View\View;

class ActiveStatusComposer
{
    public function compose(View $view)
    {
        $view->with('active_statuses', Status::getActiveStatusText());
    }
}
