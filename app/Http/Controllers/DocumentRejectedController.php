<?php

namespace App\Http\Controllers;

use App\Mail\DocumentRejected;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Put;

#[Middleware('web')]
class DocumentRejectedController
{
    /**
     * Valide a document
     *
     * @param  \Illuminate\Http\RedirectResponse $request
     * @return \Illuminate\Http\Response
     */
    #[Put('documents/{document}/reject', name: 'documents.reject', middleware: ['auth'])]
    public function __invoke(Document $document)
    {
        DB::transaction(fn () => $document->update(['rejected_at' => now(), 'validated_at' => null]));

        Mail::send(new DocumentRejected);

        return back();
    }
}
