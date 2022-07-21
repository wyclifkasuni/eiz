@extends('layouts.dashboard.adm')
@section('body')
    <main>
        {{-- Voters --}}

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All System Aspirants</h4>
                <p class="card-description"> Aspirants Preview
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-icon-text">
                        <i class="mdi mdi-briefcase-upload btn-icon-prepend"></i> New Aspiration Position </a>
                    {{-- Check if user is Super Administrator --}}
                    @if (Auth::user()->hasRole('supadm'))
                        <a href="{{ route('manageAspirant') }}" class="btn btn-outline-warning btn-icon-text">
                            <i class="mdi mdi-compare btn-icon-prepend"></i> Manage Aspirants Positions </a>
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
                                <th>Vying Position</th>

                                <th class="text-info"> Vote State </th>
                                <th>Operations</th>
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
                                    <td class="text-success text-bold"> {{ $aspirant->created_at->DiffForHumans() }}</td>
                                    <td> <a href="{{ route('showAspirant',$aspirant) }}">{{ $aspirant->name }}</a></td>
                                    <td class="text-truncate" style="max-width: 80px"> {{ $aspirant->email }} </td>
                                    <td>
                                        @isset($aspirant->Aspirant)
                                            <label
                                                class="badge badge-success">{{ $aspirant->Aspirant->Category->name }}</label>
                                        @endisset
                                    @empty($aspirant->Aspirant)
                                        <label class="badge badge-danger">NOT ASSIGNED</label>

                                    @endempty
                                </td>

                                <td> @isset($aspirant->VoteState->status)
                                        <label class="badge badge-danger">Voted</label>
                                    @endisset
                                @empty($aspirant->VoteState->status)
                                    <label class="badge badge-success">Note Voted</label>
                                @endempty
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a class="mdi mdi-pencil-box-outline mdi-24px text-warning"
                                        href="{{ route('editAspirant', $aspirant) }}"></a>
                                    </div>
                                    <div class="col">

                                        <a class="mdi mdi-eye mdi-24px text-success"
                                        href="{{ route('showAspirant', $aspirant) }}"></a>
                                  
                                    </div>
                                </div>
                                    

                                   

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

            </table>

        </div>
        {{-- pagination --}}

{{ $aspirants->links('pagination::bootstrap-5') }}

    </div>
</div>


{{-- end of event --}}
</main>
@endsection
