<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Document extends Component
{
    public $rtl = false;
    public $locale = null;

    public function __construct()
    {
        $this->locale = App::currentLocale();
        $this->rtl = in_array($this->locale,['ar','fa']);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.document');
    }
}
