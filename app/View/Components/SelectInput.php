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

    public $selecionado;

    public function __construct($selecionado)
    {
        isset($selecionado) ? $this->selecionado = $selecionado : $this->selecionado = "0";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-input');
    }
}
