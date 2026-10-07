<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DishController extends Controller
{
    protected function getDishes()
    {
        return [
            1 => ['name' => 'Bicol Express', 'main_ingredient' => 'Pork and Sili', 'origin' => 'Naga City'],
            2 => ['name' => 'Laing', 'main_ingredient' => 'Dried Taro Leaves', 'origin' => 'Camarines Sur'],
            3 => ['name' => 'Pinangat', 'main_ingredient' => 'Taro Leaves and Coconut Milk', 'origin' => 'Camarines Sur'],
            4 => ['name' => 'Kinunot', 'main_ingredient' => 'Shark or Stingray', 'origin' => 'Albay'],
            5 => ['name' => 'Sinantol', 'main_ingredient' => 'Santol Fruit', 'origin' => 'Camarines Norte'],
            6 => ['name' => 'Sili Ice Cream', 'main_ingredient' => 'Chili and Cream', 'origin' => 'Camarines Sur'],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = $this->getDishes();
        return view('dishes.index', ['dishes' => $dishes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dishes = $this->getDishes();
        if (!isset($dishes[$id])) {
            abort(404);
        }
        return view('dishes.show', ['dish' => $dishes[$id], 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Extra method (not one of the seven): featured dish.
     */
    public function featured()
    {
        $dishes = $this->getDishes();
        return view('dishes.show', ['dish' => $dishes[1], 'id' => 1]);
    }

    /**
     * Extra method (not one of the seven): filter dishes by origin.
     */
    public function filter($origin = null)
    {
        $dishes = $this->getDishes();
        if ($origin !== null) {
            $filtered = [];
            foreach ($dishes as $id => $dish) {
                if ($dish['origin'] === $origin) {
                    $filtered[$id] = $dish;
                }
            }
            $dishes = $filtered;
        }
        return view('dishes.filter', ['dishes' => $dishes, 'origin' => $origin]);
    }
}