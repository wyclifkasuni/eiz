<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AspirantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UAVController;
use App\Http\Controllers\VoteController;
use App\Models\Aspirant;
use App\Models\Category;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Isset_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {


    // 

    // test 3
    $unvotedId = DB::table('categories')
        ->select(
            'categories.id',
            // 'name'
        )
        ->leftJoin('votes', 'votes.category_id', '=', 'categories.id', 'votes.user_id', '=', auth()->user()->id)
        ->whereNull('votes.category_id')
        ->pluck('id')
        ->count();
});

// Route to all System Users after Login

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route for User Profile
Route::resource('/Profile', ProfileController::class)->middleware(['auth']);
// Routes for Super Administrator

Route::group(['middleware' => ['auth', 'role:supadm|adm']], function () {

    Route::get('/voters', [AdmController::class, 'voters'])->name('voters');
    Route::get('/votedVoters', [AdmController::class, 'votedVoters'])->name('votedVoters');
    Route::get('/pendingVoters', [AdmController::class, 'pendingVoters'])->name('pendingVoters');
    Route::get('/aspirants', [AdmController::class, 'aspirants'])->name('aspirants');
    Route::get('/users', [AdmController::class, 'users'])->name('users');
    Route::resource('/categories', CategoryController::class)->scoped(['category' => 'name']);
    Route::resource('aspirant', AspirantController::class);
    Route::get('showAspirant/{aspirant:name}', [AdmController::class, 'showAspirant'])->name('showAspirant');
    Route::get('editAspirant/{aspirant:name}', [AdmController::class, 'editAspirant'])->name('editAspirant');
    Route::post('storeAspirant/{aspirant:name}', [AdmController::class, 'storeAspirant'])->name('storeAspirant');
    Route::get('showVoter/{voter:name}', [AdmController::class, 'showVoter'])->name('showVoter');
    Route::get('manageAspirant', [AdmController::class, 'manageAspirant'])->name('manageAspirant');
    Route::delete('deletePositionforAspirant/{aspirant}', [AdmController::class, 'deletePositionforAspirant'])->name('deletePositionforAspirant');
    Route::delete('deleteVotedVoter/{voter}', [AdmController::class, 'deleteVotedVoter'])->name('deleteVotedVoter');
    Route::get('reports', [UAVController::class,'reports'])->name('reports');
});
// routes for voter/aspirants/users
Route::middleware(['auth', 'role:user|voter|aspirant'])->group(function () {
    Route::get('seeAspirant/{aspirant:name}', [UAVController::class, 'seeAspirant'])->name('seeAspirant');
    Route::get('Vote1/{aspirant:id}', [UAVController::class, 'Vote1'])->name('Vote1');
    Route::get('Vote/{user:name}', [VoteController::class, 'index'])->name('beginVoting');
    Route::get('Votes/{user:name}', [VoteController::class, 'continuevoting'])->name('continuevoting');
    Route::get('candidates', [UAVController::class, 'candidates'])->name('candidates');
    Route::get('myVote/{user:name}', [VoteController::class,'myVote'])->name('myVote');
    
});

require __DIR__ . '/auth.php';
