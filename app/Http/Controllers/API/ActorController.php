<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * Display a listing of the actor.
     */
    public function index(Request $request)
    {
        return Actor::queryParams($request->all());
    }

    /**
     * Store a newly created actor in storage.
     */
    public function store(Request $request)
    {
        $actor = Actor::create($request->all());
        return response()->json($actor, 201);
    }

    /**
     * Display the specified actor.
     */
    public function show(Actor $actor)
    {
        return response()->json($actor->load('movies'));
    }

    /**
     * Update the specified actor in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $actor->update($request->all());
        return response()->json($actor);
    }

    /**
     * Remove the specified actor from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json(null, 204);
    }
}
