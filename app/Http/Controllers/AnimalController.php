<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Отображение списка животных
    public function index()
    {
        // Получаем всех животных из базы данных
        $animals = Animal::all();

        // Возвращаем представление с данными о животных
        return view('animals.index', compact('animals'));
    }

    // Отображение формы для добавления нового животного
    public function create()
    {
        // Получаем все клетки для отображения в форме
        $cages = \App\Models\Cage::all();

        // Возвращаем форму с данными о клетках
        return view('animals.create', compact('cages'));
    }

    // Сохранение нового животного
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'required|string',
            'cage_id' => 'required|exists:cages,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Сохраняем новое животное в базе данных
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->species = $request->species;
        $animal->age = $request->age;
        $animal->cage_id = $request->cage_id;
        $animal->description = $request->description;

        // Если пользователь загрузил изображение, сохраняем его
        if ($request->hasFile('image')) {
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        $animal->save();

        // Перенаправляем на страницу с животными
        return redirect()->route('animals.index')->with('success', 'Животное успешно добавлено!');
    }

    // Отображение страницы для редактирования животного
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $cages = Cage::all();
        return view('animals.edit', compact('animal', 'cages'));
    }

    // Обновление данных животного
    public function update(Request $request, Animal $animal)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:191',
            'species' => 'required|string|max:191',
            'age' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Обновляем данные животного
        $animal->name = $request->name;
        $animal->species = $request->species;
        $animal->age = $request->age;
        $animal->description = $request->description;

        // Если пользователь загружает новое изображение, обновляем его
        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно существует
            if ($animal->image) {
                \Storage::disk('public')->delete($animal->image);
            }

            // Сохраняем новое изображение в папке animals
            $animal->image = $request->file('image')->store('animals', 'public');
        }

        // Сохраняем изменения в базе данных
        $animal->save();

        // Перенаправляем на страницу с животными с сообщением об успехе
        return redirect()->route('animals.index')->with('success', 'Животное успешно обновлено!');
    }

    // Удаление животного
    public function destroy(Animal $animal)
    {
        // Удаляем изображение, если оно существует
        if ($animal->image) {
            \Storage::disk('public')->delete($animal->image);
        }

        // Удаляем животное из базы данных
        $animal->delete();

        // Перенаправляем на страницу с животными
        return redirect()->route('animals.index')->with('success', 'Животное успешно удалено!');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id); // Найти животное по ID или выбросить 404, если не найдено.
        return view('animals.show', compact('animal')); // Отправляем данные в представление
    }

}
