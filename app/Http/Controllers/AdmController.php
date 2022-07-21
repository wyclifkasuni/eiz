<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;

class AdmController extends Controller
{
    //
    public function voters()
    {
        $voters = User::whereroleIs('voter')->get();

        return view('SupAdm.voters', compact('voters'));
    }

    // voted voters
    public function votedVoters()
    {
        $voted = User::whereroleIs('voter')->has('Vote')->latest()->get();
        return view('SupAdm.votedVoters', compact('voted'));
    }

    // Not Voted voters/ Pending
    public function pendingVoters()
    {
        $voted = User::whereroleIs('voter')->doesntHave('Vote')->latest()->get();
        return view('SupAdm.pendingVoters', compact('voted'));
    }

    // get Users
    public function users()
    {
        $users = User::latest()->get();
        return view('SupAdm.users',compact('users'));
    }
    public function aspirants()
    {

        $aspirants = User::whereroleIs('aspirant')->paginate(10);
        return view('SupAdm.aspirants', compact('aspirants'));
    }

    public function showAspirant(User $aspirant)
    {

        // dd($aspirant->id);
        return view('SupAdm.showAspirant', compact('aspirant'));
    }

    public function showVoter(User $voter)
    {

        // dd($aspirant->id);
        return view('SupAdm.showVoter', compact('voter'));
    }


    public function editAspirant(User $aspirant)
    {

        // dd($aspirant->id);
        $position = Category::get();
        return view('SupAdm.editAspirant', compact('aspirant', 'position'));
    }
    public function manageAspirant()
    {
        $aspirants = Aspirant::latest()->get();
        return view('SupAdm.manageAspirants', compact('aspirants'));
    }

    public function deletePositionforAspirant(Aspirant $aspirant)
    {
        $aspirant->delete();
        return redirect()->back()->with('status', 'Position Record Removed');
    }
    public function storeAspirant(Request $request, User $aspirant)
    {
      
        request()->validate([
            'position' => 'required',


        ]);
      
        Aspirant::create([
            'user_id' => $aspirant->id,
            'category_id' => $request->position,
        ]);
        return redirect()->route('aspirants')->with('status', 'Position Assigned');
    }

    public function deleteVotedVoter(Vote $voter)
    {
        // delete voted voter from list of voters
        // dd('Deltedinggg....');
        $voter->delete();
        return back()->with('status', 'Vote Record Deleted Succeffully');
    }
}
