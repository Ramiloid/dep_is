<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Seeder;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discipline::query()->insert([
            ['name' => 'Разработка промышленных ИС'],
            ['name' => 'Производственная информатика'],
            ['name' => 'Программная инженерия'],
            ['name' => 'Объектно-ориентированное программирование'],
            ['name' => 'Визуальное программирование'],
            ['name' => 'Микроконтроллеры'],
            ['name' => 'Промышленное программирование'],
            ['name' => 'Защита информации'],
            ['name' => 'Компьютерная графика'],
            ['name' => 'Интеллектуальные ИС'],
            ['name' => 'Моделирование ИС'],
            ['name' => 'Математика'],
            ['name' => 'Физика'],
            ['name' => 'Современная история Казахстана'],
            ['name' => 'Алгоритмизация и программирование'],
        ]);
    }
}
