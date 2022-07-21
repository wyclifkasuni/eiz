@extends('layouts.dashboard.adm')
@section('body')
    <main>
        {{-- Voters --}}

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All System Voters</h4>
                <p class="card-description"> Voters Preview
                    <a href="" class="btn btn-outline-success btn-icon-text">
                        <i class="mdi mdi-briefcase-upload btn-icon-prepend"></i> New Voter </a>
                    {{-- Check if user is Super Administrator --}}
                    @if (Auth::user()->hasRole('supadm'))
                        <a href="" class="btn btn-outline-warning btn-icon-text">
                            <i class="mdi mdi-compare btn-icon-prepend"></i> Manage Voters </a>
                    @endif
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual table-dark table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Profile </th>
                                <th>Registered</th>
                                <th class="text-warning"> Full Name(s)</th>
                                <th> Email Address</th>
                                
                                <th class="text-info"> Vote State </th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($voters as $voter)
                                <tr>
                                    <td>
                                        @isset($voter->Profile->profile)
                                        <img class="img-xs rounded-circle "
                                        src="{{ asset('images/profile/' . $voter->Profile->profile) }}"
                                        alt="Profile">
                                        @endisset
                                    </td>
                                    <td class="text-success text-bold"> {{ $voter->created_at->DiffForHumans() }}</td>
                                    <td> <a href="{{ route('showVoter',$voter) }}">{{ $voter->name }}</a></td>
                                    <td class="text-truncate" style="max-width: 80px"> {{ $voter->email }} </td>
                                    
                                    <td> @isset($voter->Vote)
                                            <label class="badge badge-success">Voted</label>
                                        @endisset
                                    @empty($voter->Vote)
                                        <label class="badge badge-danger">Not Voted</label>
                                    @endempty
                                </td>
                                <td>
                                    <a class="mdi mdi-eye mdi-24px text-success" href="{{ route('showVoter',$voter) }}"></a>
                                    
                            </td>
                        </tr>

                    @empty
                        <div class="card-body">
                            <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                    <h3>No Available Voters</h3>
                                </span></h1>

                            <hr>
                            <small class="text-center text-info">All Voters will appear here if
                                available</small>

                            <hr>
                        </div>
                    @endforelse

                </tbody>

            </table>

        </div>
        {{-- pagination --}}



    </div>
</div>


{{-- end of event --}}
</main>
@endsection
