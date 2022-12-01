<?php

namespace App\Http\Controllers;

use App\Models\Crag;
use App\Models\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRouteRequest;

class RouteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function route_create()
    {
        return view('route_create', [
            'crags' => Crag::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created route resource in storage.
     *
     * @param  StoreRouteRequest  $request
     * @return RedirectResponse
     */
    public function route_store(StoreRouteRequest $request): RedirectResponse
    {
        $route = new Route($request->validated());
        $route->save();

        return redirect(route('list'));
    }

    public function destroy($id)
    {
        $route = Route::find($id);
        $route->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}