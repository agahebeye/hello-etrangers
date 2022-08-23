<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
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
        $document->update(['validated_at' => now()]);

        return back();
    }
}
