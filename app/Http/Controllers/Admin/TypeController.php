<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'required|string|unique',
            'color' => 'nullable|hex_color'
        ], [
            'label.required' => 'Il tag è obbligatorio',
            'label.unique' => 'Esiste già un tag con questo nome',
            'color.hex_color' => 'Codice colore non valido'
        ]);

        $type = new Type();
        $type->fill($data);
        $type->save();

        return to_route('admin.types.index')->with('message', "Tag creato con successo")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'label' => ['required', 'string', Rule::unique('types')->ignore($type->id)],
            'color' => 'nullable|hex_color'
        ], [
            'label.required' => 'Il tag è obbligatorio',
            'label.unique' => 'Esiste già un tag con questo nome',
            'color.hex_color' => 'Codice colore non valido'
        ]);

        $type->update($data);

        return to_route('admin.types.index')->with('message', "Tag modificato con successo")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index')->with('message', "Tag $type->label eliminato con successo")->with('type', 'success');
    }
}
