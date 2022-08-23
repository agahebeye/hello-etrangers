<?php

namespace App\Http\Controllers;

use App\Http\Actions\StoreDocumentAction;
use App\Http\Requests\StoreDocumentRequest;
use App\Models\Document;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Put;

#[Middleware('web')]
class DocumentController
{
    /**
     * Display a listing of the documents.
     *
     * @return \Inertia\Response
     */
    #[Get(uri: '/documents', name: 'documents.index', middleware: ['auth'])]
    public function index(Request $request)
    {
        $documents = Document::query()->with('user.adress')
            ->applyFilters($request)
            ->paginate(10)->withQueryString();

        return Inertia::render('Documents/Index', [
            'documents' => $documents
        ]);
    }

    /**
     * create a document
     *
     * @return \Inertia\Response
     */
    #[Get(uri: '/documents/create', name: 'documents.create', middleware: ['auth'])]
    public function create(Request $request): \Inertia\Response
    {
        return Inertia::render('Documents/Create', [
            'hasCommanded' => $request->user()->document?->whereYear('created_at', date('Y'))->exists(),
            'role' => $request->get('role'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    #[Post(uri: '/documents/store', name: 'documents.store', middleware: ['auth'])]
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
    #[Get('/documents/{document}', name: 'documents.show', middleware: ['auth'])]
    public function show(Document $document)
    {
        return inertia()->render('Documents/Show', ['document' => fn () => $document->load(['user' => ['adress', 'role', 'photo']])]);
    }

    #[Get('/documents/{document}/edit', name: 'documents.edit', middleware: ['auth'])]
    public function edit(Document $document)
    {
        return inertia()->render('Documents/Edit', ['document' => fn () => $document->load(['user' => ['adress', 'role']])]);
    }

    #[Put('/documents/{document}/update', name: 'documents.update', middleware: ['auth'])]
    public function update(Request $request, Document $document)
    {
        //
    }
}
