<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public function index()
    {

        $animals = Animal::all();


        return view('animals.index', compact('animals'));
    }


    public function create()
    {
        $cages = \App\Models\Cage::all();
        return view('animals.create', compact('cages'));
    }


    public function store(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'required|string',
            'cage_id' => 'required|exists:cages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Получаем выбранную клетку
        $cage = Cage::find($request->cage_id);

        // Проверка, есть ли места в клетке
        if ($cage->capacity <= $cage->animals->count()) {
            return redirect()->back()->with('error', 'Нет свободных мест в выбранной клетке!')->withInput();
        }

        // Если есть место, создаём животное
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->species = $request->species;
        $animal->age = $request->age;
        $animal->cage_id = $request->cage_id;
        $animal->description = $request->description;

        if ($request->hasFile('image')) {
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Животное успешно добавлено!');
    }


    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }


    public function update(Request $request, Animal $animal)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'required|string',
            'cage_id' => 'required|exists:cages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $animal->name = $request->name;
        $animal->species = $request->species;
        $animal->age = $request->age;
        $animal->cage_id = $request->cage_id;
        $animal->description = $request->description;


        if ($request->hasFile('image')) {

            if ($animal->image) {
                \Storage::disk('public')->delete($animal->image);
            }


            $animal->image = $request->file('image')->store('animals', 'public');
        }

        $animal->save();

        return redirect()->route('animals.index')->with('success', 'Животное успешно обновлено!');
    }


    public function destroy(Animal $animal)
    {
        if ($animal->image) {
            \Storage::disk('public')->delete($animal->image);
        }

        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено!');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }
}
