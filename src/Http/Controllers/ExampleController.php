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

        $totals = [
            'new_orders' => rand(0, 100),
            'success_orders' => rand(0, 100),
            'clients' => rand(0, 100),
            'new_web_forms' => rand(0, 100),
        ];

        $todays = [
            'registers' => rand(0, 1000),
            'subscribers' => rand(0, 100),
            'autopayments' => rand(0, 100),
            'stop_subscribes' => rand(0, 100),
        ];

        return view('lte::content.home', compact('totals', 'todays'));
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
            ['id' => 1, 'text' => 'New order',],
            ['id' => 2, 'text' => 'Canceled',],
            ['id' => 3, 'text' => 'Approved',],
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

    public function tags(Request $request)
    {
        return response()->json([
            'results' => [
                [
                    'id' => '1',
                    'text' => 'News',
                ],
                [
                    'id' => '2',
                    'text' => 'Scince',
                ],
                [
                    'id' => '3',
                    'text' => 'Sport',
                ],
                [
                    'id' => '4',
                    'text' => 'Auto',
                ],
                [
                    'id' => '5',
                    'text' => 'Weather',
                ],
                [
                    'id' => '6',
                    'text' => 'Economy',
                ],
                [
                    'id' => '7',
                    'text' => 'Nature',
                ],
            ],
        ]);
    }
}
