<?php

namespace App\Http\Controllers;

use App\Http\Requests\document\StoreDocumentRequest;
use App\Http\Requests\document\UpdateDocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Models\Document;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $documents = Document::paginate($request->get('pageSize', 10));

        return DocumentResource::collection($documents)->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDocumentRequest $request
     * @return JsonResponse
     */
    public function store(StoreDocumentRequest $request)
    {
        $file = $request->file('file');

        $document = Document::create(
            [
                ...$request->except('file'),
                'path' => $file->path(),
                'file_name' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension()
            ]
        );

        return (new DocumentResource($document))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $document = Document::find($id);

        return (new DocumentResource($document))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDocumentRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateDocumentRequest $request, int $id)
    {
        $document = Document::findOrFail($id);
        $file = $request->file('file');

        $document->update(
            [
                ...$request->except('file'),
                'path' => $file->path(),
                'file_name' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension()
            ]
        );

        return (new DocumentResource($document))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        Document::destroy($id);

        return response()->json()->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
