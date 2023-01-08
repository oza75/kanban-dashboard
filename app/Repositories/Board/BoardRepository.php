<?php

namespace App\Repositories\Board;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Database\Eloquent\Collection;

interface BoardRepository
{
    /**
     * We designed something to support multiple board but in your
     * case we working for only one board so we created a test bord
     * using a seeder and this line will return that board
     *
     * @return Board
     */
    public function currentBoard(): Board;

    /**
     * @param Board $board
     *
     * @return Collection<Column>
     */
    public function columns(Board $board): Collection;

    /**
     * @param Board $board
     * @param array $data
     *
     * @return Column
     */
    public function addColumn(Board $board, array $data): Column;

    /**
     * @param Board $board
     * @param array $newPositions
     *
     * @return void
     */
    public function reOrderColumns(Board $board, array $newPositions): void;
}
