<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;

class CageController extends Controller
{
    // Метод для отображения всех клеток
    public function index()
    {

        $cages = Cage::all();  // Получение всех клеток
        return view('cages.index', compact('cages'));
    }

    // Метод для создания новой клетки
    public function create()
    {
        return view('cages.create');
    }

    // Метод для сохранения новой клетки
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        Cage::create($request->all());

        return redirect()->route('cages.index');
    }


    // Метод для удаления клетки
    public function destroy($id)
    {
        $cage = Cage::find($id);

        // Проверяем, есть ли животные в клетке
        if ($cage->animals->count() > 0) {
            return redirect()->route('cages.index')->with('error', 'Невозможно удалить клетку, так как в ней есть животные.');
        }

        // Удаляем клетку
        $cage->delete();

        return redirect()->route('cages.index')->with('success', 'Клетка успешно удалена.');
    }

    // Метод для отображения формы редактирования клетки
    public function edit($id)
    {
        $cage = Cage::findOrFail($id);
        return view('cages.edit', compact('cage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
        ]);

        $cage = Cage::findOrFail($id);

        // Проверка, что новое значение вместимости клетки не меньше количества животных в клетке
        $currentAnimalsCount = $cage->animals()->count();
        if ($request->capacity < $currentAnimalsCount) {
            return back()->withErrors(['capacity' => 'Новая вместимость клетки не может быть меньше количества животных в клетке.']);
        }

        // Обновление данных клетки
        $cage->update($request->all());

        return redirect()->route('cages.index');
    }

    public function show($id)
    {
        $cage = Cage::findOrFail($id);
        $animals = $cage->animals;
        return view('cages.show', compact('cage', 'animals'));
    }
}
