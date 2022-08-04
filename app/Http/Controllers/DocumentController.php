<?php

namespace App\Http\Controllers;

use App\Http\Actions\StoreDocumentAction;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\Adress;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;

class DocumentController extends Controller
{
    /**
     * Display a listing of the documents.
     *
     * @return \Inertia\Response
     */
    #[Get(uri:'/documents', name: 'documents.index', middleware:['auth'])]
    public function index()
    {
        return Inertia::render('Documents/Index');
    }

    /**
     * create a document
     *
     * @return \Inertia\Response
     */
    #[Get(uri:'/documents/create', name:'documents.create', middleware:['auth'])]
    public function create(): \Inertia\Response
    {
        return Inertia::render('Documents/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #[Get(uri:'/documents/store', name:'documents.store', middleware:['auth'])]
    public function store(StoreDocumentRequest $storeDocumentRequest, StoreDocumentAction $storeDocumentAction)
    {
        $storeDocumentAction->handle($storeDocumentRequest);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
