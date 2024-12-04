<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Удаляем пользователя, если он уже существует
        User::where('email', 'admin@example.com')->delete();

        // Создаем нового администратора
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'), // Укажите нужный пароль
        ]);
    }
}
