@extends('layouts.dashboard.adm')
@section('body')
<div class="card">
    <div class="card-header float-end text-dribbble text-end"> Below Voter's Hsve No Vote Records</div>
    <div class="table-responsive">
        <table class="table table-bordered table-contextual table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th> Profile </th>
                    <th class="text-warning"> Full Name(s)</th>
                    <th> Email Address</th>
                    <th> Phone Number</th>
                    <th> Gender</th>
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
                        <td> {{ $voter->Profile->phone }} </td>
                        <td> {{ $voter->Profile->gender }} </td>
                        
                      
                    </tr>

                @empty
                    <div class="card-body">
                        <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                <h3> No Available UNvoted Voters Records </h3>
                            </span></h1>

                        <hr>
                        <small class="text-center text-info">All voters Who Have Not Voted will appear here if
                            available</small>

                        <hr>
                    </div>
                @endforelse

            </tbody>

        </table>
    </div>
    </div>
@endsection
