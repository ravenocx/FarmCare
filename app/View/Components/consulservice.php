<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class consulservice extends Component
{
    /**
     * Create a new component instance.
     */
    public $doctorImage;
    public $alt;
    public $name;
    public $specialist;
    public $experience;
    public $price;

    public function __construct($doctorImage, $alt, $name, $specialist, $experience, $price)
    {
        $this->doctorImage = $doctorImage;
        $this->alt = $alt;
        $this->name = $name;
        $this->specialist = $specialist;
        $this->experience = $experience;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.consulservice');
    }
}
