@extends('layouts.dashboard.adm')
@section('body')
<div class="card">
    <div class="card-header float-end text-dribbble text-end">Delete to Remove  Voter's Vote Records</div>
    <div class="table-responsive">
        <table class="table table-bordered table-contextual table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th> Profile </th>
                    <th class="text-warning"> Full Name(s)</th>
                    <th> Email Address</th>
                    <th> Vote Count</th>
                    <th> Operation</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($voted as $voter)
                    <tr>
                        <td>
                            @isset($voter->Profile->profile)
                                <img class="img-xs rounded-circle "
                                    src="{{ asset('images/profile/' . $voter->Profile->profile) }}" alt="Profile">
                            @endisset
                        </td>

                        <td> {{ $voter->name }}</td>
                        <td> {{ $voter->email }} </td>
                        <td>
                            <div class="badge badge-outline-success rounded-pill">{{ $voter->Vote->count() }}</div>{{ Str::plural('Vote', $voter->Vote->count()) }}
                        </td>

                        <td>
                            <form action="{{ route('deleteVotedVoter',$voter) }}" method="post">

                                @csrf
                                @method('DELETE')

                                @if (Auth::user()->hasRole('supadm'))
                                    <button
                                        class="active bg-danger btn-danger btn-outline-behance btn-sm mdi mdi-delete-forever s sb1 "
                                        type="submit"
                                        onclick=" return confirm('Are yo Sure to Delete this voter Votes Records?')"></button>
                                @endif

                            </form>
                        </td>
                    </tr>

                @empty
                    <div class="card-body">
                        <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                <h3>No Available Vote Records </h3>
                            </span></h1>

                        <hr>
                        <small class="text-center text-info">All voters Who Voted will appear here if
                            available</small>

                        <hr>
                    </div>
                @endforelse

            </tbody>

        </table>
    </div>
    </div>
@endsection
