<?php

namespace App\Repositories\Board;

use App\Models\Board;
use App\Models\Column;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class DefaultBoardRepository extends BaseRepository implements BoardRepository
{
    /**
     * We designed something to support multiple board but in your
     * case we working for only one board so we created a test bord
     * using a seeder and this line will return that board
     *
     * @return Board
     */
    public function currentBoard(): Board
    {
        /** @var Board $board */
        $board = Board::query()->first();

        return $board;
    }

    /**
     * @param Board $board
     *
     * @return Collection
     */
    public function columns(Board $board): Collection
    {
        return $board->columns()->with('cards')->orderBy('position')->get();
    }

    /**
     * @param Board $board
     * @param array $data
     *
     * @return Column
     */
    public function addColumn(Board $board, array $data): Column
    {
        /** @var Column $column */
        $column = $board->columns()->create($data);

        return $column;
    }

    public function reOrderColumns(Board $board, array $newPositions): void
    {
        foreach ($newPositions as $position) {
            $board->columns()
                ->where('columns.id', $position['id'])
                ->update(['position' => $position['position']]);
        }
    }
}
