<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        $items = Item::orderBy("created_at","desc")->paginate(10);
        return view("item.index", compact("items"));
    }

    public function create(){
        return view("item.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'hsn_code' => 'nullable',
            'sac_code' => 'nullable',
            'price' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0|max:100'
        ]);

        $item = Item::create($validatedData);
        
        if($item->save()){
            return redirect()->back()->with('success', 'Item creado correctamente.');
        } else {
            return "Algo salio mal";
        }
    }

    public function edit($id){
        $item = Item::find($id);   
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'hsn_code' => 'nullable',
            'sac_code' => 'nullable',
            'price' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0|max:100'
        ]);

        $item = Item::findOrFail($id);

        $item->update($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Item actualizado correctamente.');
    }

    public function destroy(Item $item, $id)
    {
        $item->where("id", $id)->delete();
        
        return redirect()->back()->with("success","Eliminado correctamente");
    }
}
