<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    /**
     * The dropwdown name.
     *
     * @var string
     */
    public $name;

    /**
     * The dropdown options.
     *
     * @var string
     */
    public $options;

    /**
     * Dropdown panel position
     */
    public $panelPosition;


    /**
     * List or checkboxes
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $options, $panelPosition = 'right', $type = 'list')
    {
        $this->name = $name;
        $this->options = $options;
        
        $this->panelPosition = $panelPosition;
        
       
        $this->type = $type;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dropdown');
    }
}