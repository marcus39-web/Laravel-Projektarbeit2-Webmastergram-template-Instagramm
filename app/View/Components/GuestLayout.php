<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Gibt die View/Inhalte zurück, die die Komponente repräsentieren.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}
