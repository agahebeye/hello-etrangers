<?php

namespace App\Http\Controllers;

use App\Models\Document;
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
        $document->update(['rejected_at' => now(), 'validated_at' => null]);

        return back();
    }
}
