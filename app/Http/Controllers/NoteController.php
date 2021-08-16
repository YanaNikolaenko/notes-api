<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;

class NoteController extends Controller
{
    public function list ()
    {
        return NoteResource::collection(Note::all());
    }

    public function store (NoteRequest $request)
    {
        return new NoteResource(Note::create($request->all()));
    }

    public function update(NoteRequest $request, $note_id)
    {
        Note::find($note_id)->update($request->all());//return true or false
        return new NoteResource(Note::find($note_id));
    }


}
