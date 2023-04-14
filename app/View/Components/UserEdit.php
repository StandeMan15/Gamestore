<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserEdit extends Component
{
    public $type;
    public $name;
    public $id;
    public $value;
    public $readonly; // Add a public property for the readonly status

    public function __construct($type = 'text', $name = '', $id = '', $value = '', $readonly = false)
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->readonly = $readonly; // Assign the readonly status to the public property
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-edit');
    }
}
