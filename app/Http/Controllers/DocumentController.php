<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        //
        $type = DocumentType::where("slug", $type)->firstOrFail();
        $documents = $type->documents()->orderBy('id','desc')->paginate(10);
        return view('documents.index', compact('type','documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        $type = DocumentType::where("slug", $type)->firstOrFail();
        $document = null; // Or new Document(), depending on your requirements
        return view('documents.form', compact('type', 'document'));
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
    public function show(Document $document)
    {
        //
        return view('document.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $type = $document->documentType;
        return view('documents.form', compact('type', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document, $id)
    {
        $document->where("id", $id)->delete();
        
        return redirect()->back()->with("success","Eliminado correctamente");
    }
}
