<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        return Produto::search($request->get('q'))->with('procura')->get();
    }
}
