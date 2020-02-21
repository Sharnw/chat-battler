<?php

namespace App\Http\Controllers;

use App\Game;
use App\Battle;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBattleRequest;

class BattleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $battles = Battle::all();
        return view('battles.index', compact('battles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('user_id', auth()->user()->id)->get();
        if ($games->count() == 0) return redirect()->back()->with('app-error', 'You must create a game before you can create battles.');

        return view('battles.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBattleRequest $request)
    {
        $battle = Battle::create($request->only(['name', 'game_id']));

        $battle->characters()->sync($request->input('characters'));

        return redirect()->route('battles.show', $character)->with('app-success', 'Battle created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function show(Battle $battle)
    {
        return view('battles.show', compact('battle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function edit(Battle $battle)
    {
        $games = Game::where('user_id', auth()->user()->id)->get();

        return view('battles.edit', compact('battle', 'games'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBattleRequest $request, Battle $battle)
    {
        $battle->update($request->only(['name', 'game_id']));

        $battle->characters()->sync($request->input('characters'));

        return redirect()->route('battles.show', $battle)->with('app-success', 'Battle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Battle $battle)
    {
        $battle->delete();
        return redirect()->back();
    }
}
