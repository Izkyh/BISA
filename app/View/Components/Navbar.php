<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navbar extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.navbar');
    }
}

// ===================================

// app/View/Components/Sidebar.php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Sidebar extends Component
{
    public $popularArticles;
    public $upcomingEvents;

    /**
     * Create a new component instance.
     */
    public function __construct($popularArticles = [], $upcomingEvents = [])
    {
        $this->popularArticles = $popularArticles;
        $this->upcomingEvents = $upcomingEvents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.sidebar');
    }
}
