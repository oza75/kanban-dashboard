<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddColumnRequest;
use App\Http\Requests\ReOrderColumnsRequest;
use App\Http\Resources\ColumnResource;
use App\Models\Board;
use App\Repositories\Board\BoardRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BoardController extends Controller
{
    private BoardRepository $repository;

    /**
     * @param BoardRepository $repository
     */
    public function __construct(BoardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function columns(Request $request): AnonymousResourceCollection
    {
        // We designed something to support multiple board
        // but in your case we working for only one board
        // so we created a test bord using a seeder and
        // this line will return that board
        $board = $this->repository->currentBoard();

        $columns = $this->repository->columns($board);

        return ColumnResource::collection($columns);
    }

    /**
     * @param AddColumnRequest $request
     *
     * @return ColumnResource
     */
    public function addColumn(AddColumnRequest $request): ColumnResource
    {
        $board = $this->repository->currentBoard();

        $column = $this->repository->addColumn($board, $request->data());

        return new ColumnResource($column);
    }

    public function reOrderColumns(ReOrderColumnsRequest $request) {

        $board = $this->repository->currentBoard();

        $this->repository->reOrderColumns($board, $request->newPositions());
    }
}
