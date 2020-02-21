<?php

namespace App\Http\Controllers;

use App\Game;
use App\Character;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('user_id', auth()->user()->id)->get();
        if ($games->count() == 0) return redirect()->back()->with('app-error', 'You must create a game before adding characters.');

        return view('characters.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterRequest $request)
    {
        $character = Character::create($request->only(['name', 'game_id']));

        $character->items()->sync($request->input('items'));        

        return redirect()->route('characters.show', $character)->with('app-success', 'Character created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $games = Game::where('user_id', auth()->user()->id)->get();

        return view('characters.edit', compact('character', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCharacterRequest $request, Character $character)
    {
        $character->update($request->only(['name', 'game_id']));

        $character->items()->sync($request->input('items'));        

        return redirect()->route('characters.show', $character)->with('app-success', 'Character updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->back();
    }
}
