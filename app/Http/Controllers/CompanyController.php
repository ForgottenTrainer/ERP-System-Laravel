<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoice = \App\Models\Invoice::find(1);
        
        $user = Auth::user(); 
        if ($user) {
            $user->assignRole('Super Admin');
        }
        $companies = Company::paginate(10);
        return view("company.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("company.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:companies",
            "mobile" => "required|digits:10"
        ]);

        $company = Company::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "mobile" => $request->mobile
        ]);

        if($company->save())
        {
            return redirect()->route("company.create")->with("success","Creado satisfactorimente");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return redirect()->back()->with('error', 'Empresa no encontrada.');
        }
        return view('company.edit', compact('company'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required",
            "mobile" => "required|digits:10"
        ]);
    
        // Actualiza directamente sin recuperar el modelo
        $updateResult = Company::where('id', $id)->update($validated);
    
        if ($updateResult) {
            // Si se actualizó al menos una fila, redirecciona con mensaje de éxito
            return redirect()->route('company.edit',$id)->with("success", "Empresa actualizada satisfactoriamente");
        } else {
            // Si no se actualizó ninguna fila, puede que no exista el registro o no hubo cambios necesarios
            return redirect()->back()->with("error", "No se pudo actualizar la empresa o no existen cambios");
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, $id)
    {
        $company->where("id", $id)->delete();
        
        return redirect()->back()->with("success","Eliminado correctamente");
    }
}
