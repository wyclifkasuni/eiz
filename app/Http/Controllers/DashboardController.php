<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {

        # code...
        $supAdms = User::whereRoleIs('supadm')->get()->count();
        $Adms = User::whereRoleIs('adm')->get()->count();
        $aspirant = User::whereRoleIs('aspirant')->get()->count();
        $voter = User::whereRoleIs('voter')->get()->count();
        $male = User::whereRelation('Profile', 'gender', 'Male')->get()->count();
        $female = User::whereRelation('Profile', 'gender', 'Female')->get()->count();
        $CVote = Vote::has('VoteState')->get()->count();
        $PVote = Vote::whereDoesntHave('VoteState')->get()->count();
        $Votes = Vote::latest()->get()->count();


        // Data to show Votes in line graph

// 
$items2 = DB::select(DB::raw("SELECT u.name as name, count(*) as count FROM users u 
JOIN aspirants a ON a.user_id = u.id 
JOIN votes v ON v.aspirant_id =a.id group by u.name"));

$labels=[];
$data=[];
foreach ($items2 as $item){
    $labels[] = $item->name;
    $data[] = $item->count;
}

// // 
// dd($labels,$data);





        // $items = Vote::select(
        //     DB::raw("(COUNT(*)) as count"),
        //     DB::raw("(aspirant_id) as aspirant_id")
        // )
        //     // ->whereYear('created_at', date('Y'))
        //     ->groupBy('aspirant_id')
        //     ->get()

        //     ->pluck('count', 'aspirant_id');
        // $labels = $items->keys();
        // $data = $items->values();
        // end 


        if (Auth::user()->hasRole(['supadm', 'adm'])) {
            # code...
            return view('SupAdm.dashboard', compact(['supAdms', 'Adms', 'aspirant', 'CVote', 'PVote', 'voter', 'male', 'female', 'labels', 'data', 'Votes']));
        } elseif (Auth::user()->hasRole(['user', 'voter'])) {

            

            $aspirants = User::whereroleIs('aspirant')->get();
            $catCount = Category::all()->count();

            return view('User.dashboard', compact('aspirants','catCount'));
        } elseif (Auth::user()->hasRole('aspirant')) {
            # code...
            $aspid = Aspirant::where('user_id', auth()->user()->id)->pluck('id');
            $AspVotes = Vote::where('aspirant_id', $aspid)->count();
            $category = Aspirant::where('user_id', auth()->user()->id)->pluck('category_id');
            $memberCount = Aspirant::where('category_id', $category)->count();
            $allvote = Vote::where('category_id', $category)->count();
            return view('User.dashboard', compact(['AspVotes', 'memberCount', 'allvote']));
        }
    }
}
