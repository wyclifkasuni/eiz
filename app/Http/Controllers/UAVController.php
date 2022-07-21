<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class UAVController extends Controller
{
    //

    public function seeAspirant(User $aspirant)
    {

        return view('User.seeAspirant', compact('aspirant'));
    }

    // Begins Voting
    public function Vote1(Aspirant $aspirant)
    {

        $user_id = auth()->user()->id;
        // dd($user_id);
        $categoryid = $aspirant->Category->id;

        Vote::create([
            'user_id' => $user_id,
            'aspirant_id' => $aspirant->id,
            'category_id' => $categoryid,

        ]);
        // return 'Vote counted';

        // $aspirants = Aspirant::whereNot('category_id', $categoryid)->get();

        // new code 1

        $unvotedId = Category::whereDoesntHave('votes', function (Builder $query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        if ($unvotedId->count() >= 1) {
            # code...
            foreach ($unvotedId as $Uid) {

                $aspirants = Aspirant::where('category_id', $Uid->id)->get();
                Alert::success('Congrats!', 'Sucess! You\'ve Voted For, ' . $aspirant->Category->name . ' Continue!');
                // dd($aspirants);
                return view('Votes.index', compact('aspirants'))->with('status', 'You Voted for,' . $aspirant->Category->name . 'Successfuly, Continue Voting');
            }
        } else {
            Alert::success('success', 'You have Successfully Completed Your Voting ');
            return redirect()->route('dashboard');
        }



        // end



        // New Codes
        // $unvotedId = DB::table('categories')
        //     ->select(
        //         'categories.id',
        //         // 'name'
        //     )
        //     ->leftJoin('votes', 'votes.category_id', '=', 'categories.id', 'votes.user_id', '=', auth()->user()->id)
        //     ->whereNull('votes.category_id')
        //     ->pluck('id')
        //     ->count();
        //     return $unvotedId;
        //    dd($unvotedId);


        //     if ($unvotedId >= 1) {
        //         # code...
        //         $aspirants = Aspirant::where('category_id', $unvotedId)->findOrFail($unvotedId);
        //         Alert::success('Congrats!', 'You\'ve Successfully Voted For, ' . $aspirant->Category->name . ' Continue Voting!');
        //         // dd($aspirants);
        //         return view('Votes.index', compact('aspirants'))->with('status', 'You Voted for,' . $aspirant->Category->name . 'Successfuly, Continue Voting');
        //     } else if($unvotedId = 0) {
        //         Alert::success('Congrats!', 'Voting Completed Successfully');
        //         // dd($aspirants);
        //         return redirect()->route('dashboard');
        //     }
    }

    // use scenerio where after voting, check  the categories that has no votes contained in votes for the specific user, then load those aspirants not voted for
    // get category ids in votes that are not in Category ids, populate that data..
    // 

    public function candidates()
    {
        $aspirants = User::whereroleIs('aspirant')->get();
    }

    public function reports(Request $request)
    {
        $categories=Category::all();

        if ($request->category !=null) {
            # code...
            // dd($request->all());
            $category=Category::where('id',$request->category)->select('name')->first();
           
            $data = DB::select(DB::raw("SELECT u.name as name, count(*) as count FROM users u 
            JOIN aspirants a ON a.user_id = u.id 
            JOIN votes v ON v.aspirant_id =a.id where v.category_id=$request->category group by u.name"));
            // dd($data);
            return view('SupAdm.reports',compact(['data','category','categories']));
           
        } else {
            # code...
            $data=[];
            $category=Category::select('name')->first();
            return view('SupAdm.reports',compact(['data','category','categories']));
        }

      
    }
}
