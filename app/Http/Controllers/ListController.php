<?php

namespace App\Http\Controllers;

use App\Models\Crag;
use App\Models\Route;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('list', [
            'routes' => Route::orderBy('name', 'ASC')->paginate(5, ['*'], 'routes'),
            'crags' => Crag::orderBy('name', 'ASC')->paginate(5, ['*'], 'crags')
        ]);
    }

}