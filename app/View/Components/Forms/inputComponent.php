<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = '',
        public string $placeholder = '',
        public string $name = '',
        public string $input_class = '',
        public string $value = '',
        public string $span_class = '',
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-component');
    }
}
