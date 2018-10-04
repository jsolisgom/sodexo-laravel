<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Modulo;
use App\Submodulo;

class SideBarComposer{
    public function compose(View $view){
        $modulos = Modulo::with('submodulos')->get();
        $view->with('modulos', $modulos);
    }
}