<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class NavComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public $active;
    public function __construct()
    {
        $this->items = [
            [
                'icon' => "nav-icon fas fa-tachometer-alt",
                'route' => "home",
                'title' => "Home",
                'active' => "/"
            ],
            [
                'icon' => "far fa-circle nav-icon",
                'route' => "books.index",
                'title' => "Books",
                'active' => "books.*"
            ],
            [
                'icon' => "far fa-circle nav-icon",
                'route' => "authors.index",
                'title' => "Authors",
                'active' => "author.*"
            ],
            [
                'icon' => "far fa-circle nav-icon",
                'route' => "students.index",
                'title' => "Students",
                'active' => "student.*"
            ],
        ];
        $this->active = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-component');
    }
}
