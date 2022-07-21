@extends('layouts.dashboard.user')
@section('body')

    {{-- content to dispaly for Voters --}}
    @if (Auth::user()->hasRole('voter'))
        @if (auth()->user()->Vote->count() == $catCount)
            <div class="card bg-body">
                <div class="card-header">
                    <h5>THANK YOU FOR VOTING <span class="float-end text-secondary"> Below Were Candidates With Vying
                            Positions</span> </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-contextual table-dark table-hover table-striped" id="report">
                                <thead>
                                    <tr>
                                        <th>Profile </th>
                                        <th class="text-warning"> Full Name(s)</th>
                                        <th>Vying Position</th>
                                        <th>Preview</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($aspirants as $aspirant)
                                        <tr>
                                            <td>
                                                @isset($aspirant->Profile->profile)
                                                    <img class="img-xs rounded-circle "
                                                        src="{{ asset('images/profile/' . $aspirant->Profile->profile) }}"
                                                        alt="Profile">
                                                @endisset
                                            </td>

                                            <td> <a
                                                    href="{{ route('seeAspirant', $aspirant) }}">{{ $aspirant->name }}</a>
                                            </td>

                                            <td>
                                                @isset($aspirant->Aspirant)
                                                    <label
                                                        class="badge badge-success">{{ $aspirant->Aspirant->Category->name }}</label>
                                                @endisset
                                            @empty($aspirant->Aspirant)
                                                <label class="badge badge-danger">NOT YET ASSIGNED</label>

                                            @endempty
                                        </td>


                                        <td>
                                            <a class="mdi mdi-eye mdi-24px text-success"
                                                href="{{ route('seeAspirant', $aspirant) }}"></a>

                                        </td>

                                    </tr>
                                @empty
                                    <div class="card-body">
                                        <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                                <h3>No Available Aspirants</h3>
                                            </span></h1>

                                        <hr>
                                        <small class="text-center text-info">All Aspirants will appear here if
                                            available</small>

                                        <hr>
                                    </div>
                                @endforelse
                            </tbody>
                            @include('layouts.datatables')
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @elseif((auth()->user()->Vote->count() >= 1 &&
    auth()->user()->Vote->count() != $catCount))
 <div class="card bg-body">
    <div class="card-header"> Vote Reinstatement</div>
    <div class="card-body">
        <div class="row">
            <div class="col col-auto">
                <strong class="text-secondary">OOPs!! We're Sorry Something Went Wrong and You did'nt finish the Voting Process</strong>
            </div>
            <div class="col col-auto">
                <div class="btn btn-inverse-success rounded-pill">
                    <a class="text-bold text-google" href="{{ route('continuevoting', Auth::user()->name) }}">Complete Voting</a>
                   </div>
            </div>
        </div>
    </div>
 </div>


    @else
        <div class="card mb-5 bg-body">
            <div class="card-group">
                <div class="card w-75">
                    <img src="{{ asset('images/campaign/vote1.jpg') }}" class="card-img-top " alt="...">

                </div>

                <div class="card">
                    <div class="card-header text-info"> One of the most important rights of Our citizens is the
                        franchise—the right to
                        vote.
                        Its Constitutinal, You Have The Right! And, Its Your Turn To Make the Best Decision..</p>
                    </div>
                    <hr>
                    <div class="card-body">

                        <ol>
                            <li>It gives you a say on important issues that affect you
                            </li>
                            <li>It gives you the choice to vote for your local and national representatives, if you
                                don’t
                                vote, other people get to choose who represents you.
                            </li>
                            <li> Your voice is heard through your vote.
                            </li>
                            <li>If you don’t vote, other people will make the vote and make the decision for you.
                            </li>
                        </ol>

                        <hr>
                        <div class="flex-fill row">
                            <div class="col md-auto">
                                <p class="card-text"><small class="text-warning text-center"> GET STARTED</small></p>
                            </div>
                            <div class="col"> <a class="btn bnt-inverse btn-success"
                                    href="{{ route('beginVoting', auth()->user()->name) }}">VOTE</a></div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    @endif

@endif
{{-- end of Voter Dashboard --}}

{{-- content to dispaly for Aspirant --}}
@if (Auth::user()->hasRole('aspirant'))
    <div class="card-body">
        <div class="card-header text-bold text-secondary">Results Parlour</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <hr>
                    <p class="text-bold text-secondary">Hi? {{ auth()->user()->name }} ,
                        We belive that the Voting Process was Open, Honest & Transparent !</p>

                    <hr>
                </div>
                <div class="col">
                    YOU GOT <h1 class="border-start text-facebook">{{ $AspVotes }}
                        {{ Str::plural('VOTE', $AspVotes) }}</h1> <span class="text-black"> Out of <strong
                            class="text-success">{{ $allvote }}</strong> Votes</span>
                    <hr>
                    YOU WE'RE <h2 class="border-start text-facebook">{{ $memberCount }} COMPETITORS</h2>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endif
{{-- end --}}


{{-- content to dispaly for Aspirant --}}
@if (Auth::user()->hasRole('user'))
    <div class="card bg-body">
        <div class="card-header text-bold text-secondary">Welcome Back, Dear <span
                class="text-bold text-primary">{{ auth()->user()->name }}</span></div>
        <div class="card-body">
            <h5 class="text-center">Thank you for taking time to Join Us.</h5>
            <hr>
            <p class="text-bold text-secondary">We welcome comments, Acknoledgements, Complaints and Compliments. Feel
                free to Ask and Enquire us.</p>
            <hr>
        </div>
    </div>
@endif
{{-- end --}}
@endsection
