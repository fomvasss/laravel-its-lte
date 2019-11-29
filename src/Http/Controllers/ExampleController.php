<?php

namespace Fomvasss\ItsLte\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    public function treeselect(Request $request)
    {
        return response()->json([
            'data' => $this->getTree(),
            'default' => array_merge([1], [3]),
        ]);
    }

    public function treeview(Request $request)
    {
        return response()->json(
            treeview($this->getTree())
        );
    }

    public function statuses()
    {
        return response()->json(['results' => [
            ['id' => 1, 'text' => 'Новый заказ',],
            ['id' => 2, 'text' => 'Отклонен',],
            ['id' => 3, 'text' => 'Одобрен',],
        ]]);
    }

    protected function getTree()
    {
        return [
            [
                'id' => 1,
                'name' => 'Auto',
                'children' => [
                    [
                        'id' => 2,
                        'name' => 'Music',
                        'children' => [],
                    ],
                    [
                        'id' => 3,
                        'name' => 'Tuning',
                        'children' => [],
                    ],
                ],
            ],
            [
                'id' => 4,
                'name' => 'Food',
                'children' => [],
            ],
            [
                'id' => 5,
                'name' => 'Sport',
                'children' => [],
            ],
        ];
    }
}
