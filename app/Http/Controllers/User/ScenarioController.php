<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreScenarioRequest;
use App\Http\Requests\User\UpdateScenarioRequest;
use App\Http\Controllers\Controller;
use App\Models\Scenario;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/Scenario/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScenarioRequest $request)
    {
        // dd($request);
        $id = Auth::id();
        Scenario::create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $id,
            ]
        );
        return to_route('user.dashboard')->with([
            'message' => 'ネタを投稿しました',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Scenario $scenario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scenario $scenario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScenarioRequest $request, Scenario $scenario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scenario $scenario)
    {
        //
    }
}
