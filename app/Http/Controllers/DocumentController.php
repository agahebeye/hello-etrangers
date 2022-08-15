<?php

namespace App\Http\Controllers;

use App\Http\Actions\StoreDocumentAction;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\Document;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;

#[Middleware('web')]
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
        return Inertia::render('Documents/Index', [
            'documents' => Document::with('user')->get()
        ]);
    }

    /**
     * create a document
     *
     * @return \Inertia\Response
     */
    #[Get(uri:'/documents/create', name:'documents.create', middleware:['auth'])]
    public function create(Request $request): \Inertia\Response
    {
        return Inertia::render('Documents/Create', [
            'hasCommanded' => $request->user()->document()->whereYear('created_at', date('Y'))->exists(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #[Post(uri:'/documents/store', name:'documents.store', middleware:['auth'])]
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
