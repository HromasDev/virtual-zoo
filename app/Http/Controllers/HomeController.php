<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class HomeController extends Controller
{
    public function index()
    {
        // Получаем количество животных в зоопарке
        $animalCount = Animal::count();

        // Передаем количество животных в представление
        return view('index', compact('animalCount'));
    }
}
