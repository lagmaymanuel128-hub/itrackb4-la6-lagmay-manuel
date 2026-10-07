<?php

namespace App\Http\Controllers;

abstract class Controller
{
    abstract protected function getDishes();

    public function featured()
    {
        $dishes = $this->getDishes();
        $dish = $dishes[1]; // pick whichever you want featured
        return view('dishes.show', ['dish' => $dish, 'id' => 1]);
    }
}
