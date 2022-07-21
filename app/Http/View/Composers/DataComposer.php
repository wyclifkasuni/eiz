<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;

class DataComposer
{


    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'regVoters' => User::whereroleIs('voter')->count(),
            'voted' => User::whereroleIs('voter')->has('Vote')->count(),
            'notvoted' => User::whereroleIs('voter')->doesntHave('Vote')->count(),
            'regAspirants' => User::whereroleIs('aspirant')->count(),
            'aspirantPositions' => Category::all()->count(),
            'catCount' => Category::all()->count(),
        ]);
    }
}
