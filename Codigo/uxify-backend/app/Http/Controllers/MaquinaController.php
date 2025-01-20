<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Illuminate\Http\Request;

class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $maquinas = Maquina::with('section.campus')->get();
//        return response()->json($maquinas);
//    }

    public function index()
    {
        $maquinas = Maquina::with('section.campus')->paginate(8); // Adjust the number of items per page as needed
        return response()->json($maquinas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Maquina $maquina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maquina $maquina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maquina $maquina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maquina $maquina)
    {
        //
    }

    public function countMaquinas(){
        $maquinasTotal = Maquina::count();
        $maquinas1 = Maquina::where('prioridad', 1)->count();
        $maquinas2 = Maquina::where('prioridad', 2)->count();
        $maquinas3 = Maquina::where('prioridad', 3)->count();

        return response()
            ->json([
                'total' => $maquinasTotal,
                'prioridad1' => $maquinas1,
                'prioridad2' => $maquinas2,
                'prioridad3' => $maquinas3,
            ]);
    }
}
