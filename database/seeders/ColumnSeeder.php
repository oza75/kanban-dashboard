<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = [
            ['name' => 'Open'],
            ['name' => 'In progress'],
            ['name' => 'Done'],
        ];

        /** @var Board $board */
        $board = Board::query()->first();

        foreach ($columns as $column) {
            $board->columns()->firstOrCreate($column);
        }
    }
}
