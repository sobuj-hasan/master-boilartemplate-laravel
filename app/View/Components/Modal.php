<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $title = '';
    public $id = '';
    public $modalSize = '';
    public $button = 'Save';

    /**
     * Create a new component instance.
     */

    public function __construct($title, $id, $modalSize, $button)
    {
        $this->id = $id;
        $this->title = $title;
        $this->modalSize = $modalSize;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
