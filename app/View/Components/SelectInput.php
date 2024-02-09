<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SelectInput extends Component
{
    /**
     * Create a new component instance.
     */

    public $options;

    public $value;

    public function __construct($value, $options)
    {
        isset($value) ? $this->value = $value : $this->value = "";
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
