<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Http\Actions\StoreDocumentAction;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Put;
use App\Http\Requests\StoreDocumentRequest;
use Spatie\RouteAttributes\Attributes\Post;
use App\Http\Requests\UpdateDocumentRequest;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

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
        throw_unless($request->user()->isAdministrator(), AuthorizationException::class, "Vous n'êtes pas autorisé à accéder à cette page");

        $documents = Document::select(['id', 'rejected_at', 'validated_at', 'visa_kind', 'user_id'])
            ->latest()
            ->with('user.adress')
            ->search()
            ->status()
            ->paginate(10)->withQueryString();

        return Inertia::render('Documents/Index', [
            'documents' => $documents,
            'filters' => $request->all('status', 'search',)
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
    public function show(Document $document, Request $request)
    {
        throw_unless($request->user()->isAdministrator(), AuthorizationException::class, "Vous n'êtes pas autorisé à accéder à cette page");

        return inertia()->render('Documents/Show', [
            'document' => fn () => $document->load(['user' => ['adress', 'role', 'photo']]),
        ]);
    }

    #[Get('/documents/{document}/edit', name: 'documents.edit', middleware: ['auth'])]
    public function edit(Document $document, Request $request)
    {
        throw_unless($request->user()->isAdministrator(), AuthorizationException::class, "Vous n'êtes pas autorisé à accéder à cette page");

        return inertia()->render('Documents/Edit', ['document' => fn () => $document->load(['user' => ['adress', 'role']])]);
    }

    #[Put('/documents/{document}/update', name: 'documents.update', middleware: ['auth'])]
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        throw_unless($request->user()->isAdministrator(), AuthorizationException::class, "Vous n'êtes pas autorisé à accéder à cette page");

        DB::transaction(function () use ($document, $request) {
            $document->update($request->safe()->except(['first_name', 'last_name', 'adress']));
            $document->user->adress()->updateOrCreate(['avenue' => $request->adress]);
            return $document->wasChanged();
        });

        return to_route('documents.index');
    }
}
