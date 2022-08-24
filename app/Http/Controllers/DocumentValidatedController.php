<?php

namespace App\Http\Controllers;

use App\Mail\DocumentValidated;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Put;

#[Middleware('web')]
class DocumentValidatedController
{
    /**
     * Valide a document
     *
     * @param  \Illuminate\Http\RedirectResponse $request
     * @return \Illuminate\Http\Response
     */
    #[Put('documents/{document}/validate', name: 'documents.validate', middleware: ['auth'])]
    public function __invoke(Document $document)
    {
        DB::transaction(fn () => $document->update(['validated_at' => now(), 'rejected_at' => null]));

        Mail::send(new DocumentValidated);

        return back();
    }
}
