<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        // dd($user->name);
        $aspirants = Aspirant::orderBy('category_id')->get();
        // return response()->json(['message'=>'I am Dude']);
        return view('Votes.index', compact('user', 'aspirants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }

    public function continuevoting(User $user)
    {

        $unvotedId = Category::whereDoesntHave('votes', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->pluck('id');
        // dd($unvotedId);

        foreach ($unvotedId as $id){
            $aspirants=Aspirant::where('category_id',$id)->get();
            return view('Votes.index',compact('aspirants'));

        }
        
    }
    // return User Votes
    public function myVote(User $user){
        
        $MyVotes=Vote::where('user_id',$user->id)->get();
        // dd($MyVotes);
        return view('Votes.myVote',compact('MyVotes'));

    }
}
