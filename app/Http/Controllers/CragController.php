<?php

namespace App\Http\Controllers;

use App\Models\Crag;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCragRequest;

class CragController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function crag_create()
    {
        return view('crag_create');
    }

    /**
     * Store a newly created crag resource in storage.
     *
     * @param  StoreCragRequest  $request
     * @return RedirectResponse
     */
    public function crag_store(StoreCragRequest $request): RedirectResponse
    {
        
        $crag = new Crag($request->validated());
        $crag->save();

        return redirect(route('list'));
    }
}