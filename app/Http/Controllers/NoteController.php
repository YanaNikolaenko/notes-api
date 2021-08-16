<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Http\Resources\NoteCollection;
use App\Models\Note;

class NoteController extends Controller
{
    public function list ()
    {
        return new NoteCollection(Note::paginate(0));
    }

    public function store (NoteRequest $request)
    {
        return new NoteResource(Note::create($request->validated()));
    }

    public function update(NoteRequest $request, Note $note)
    {
        return new NoteResource($note->update($request->validated()));
    }

}
