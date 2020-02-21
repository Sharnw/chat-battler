<?php

namespace App\Http\Controllers;

use ChatSources;
use App\Source;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSourceRequest;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sources = Source::all();
        return view('sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of enabled chat sources
        $chat_sources = ChatSources::toArray();

        return view('sources.create', compact('chat_sources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSourceRequest $request)
    {
        $input = $request->only(['name', 'identifier']);
        $input['user_id'] = auth()->user()->id;
        if ($request->input('settings')) {
            $input['settings'] = json_encode($request->input('settings'));
        }

        $source = Source::create($input);

        return redirect()->route('sources.show', $source)->with('app-success', 'Source created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        return view('sources.show', compact('source'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        // get list of enabled chat sources
        $chat_sources = ChatSources::toArray();

        return view('sources.edit', compact('source', 'chat_sources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSourceRequest $request, Source $source)
    {
        $source->update($request->input());
        return redirect()->route('sources.show', $source)->with('app-success', 'Source updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Source  $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->destroy();
        return redirect()->back();
    }
}
