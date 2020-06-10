<?php

namespace Fomvasss\ItsLte\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExampleController extends Controller
{
    public function home()
    {
        if (!\Session::get('visit')) {
//            \Session::flash('error', 'Error Laravel Admin LTE!');
//            \Session::flash('warning', 'Warning Laravel Admin LTE!');
//            \Session::flash('success', 'Success Laravel Admin LTE!');
            \Session::flash('info', 'Welcome to Laravel Admin LTE!');

            \Session::put('visit', 1);
        }

        return view('lte::content.home');
    }

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

    public function status(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'message' => 'Status is changed',
        ]);
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
