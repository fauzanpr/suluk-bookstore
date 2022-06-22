<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.chart',[
            'title' => 'chart',
            'chart_items' => $data_get,
            'chart_count' => count($data_get)
        ]);
    }
}
