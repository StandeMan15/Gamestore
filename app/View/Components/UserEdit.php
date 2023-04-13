<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserEdit extends Component
{
    public $type;
    public $name;
    public $id;
    public $value;

    public function __construct($type = 'text', $name = '', $id = '', $value = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
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
