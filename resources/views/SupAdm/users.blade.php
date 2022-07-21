@extends('layouts.dashboard.adm')
@section('body')
       
    <div class="card bg-body">
        <div class="card-header float-end text-dribbble text-end"> User Data & Bio Information</div>
        <div class="table-responsive">
            <table class="table table-bordered table-contextual table-dark table-hover table-striped" id="report">
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
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                @isset($user->Profile->profile)
                                    <img class="img-xs rounded-circle "
                                        src="{{ asset('images/profile/' . $user->Profile->profile) }}" alt="Profile">
                                @endisset
                            </td>

                            <td> {{ $user->name }}</td>
                            <td> {{ $user->email }} </td>
                            <td> @isset($user->Profile->phone)
                                    {{ $user->Profile->phone }}
                                @endisset </td>
                            <td> @isset($user->Profile->gender)
                                    {{ $user->Profile->gender }}
                                @endisset </td>

                        </tr>

                    @empty
                        <div class="card-body">
                            <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                    <h3> No Available UNvoted users Records </h3>
                                </span></h1>

                            <hr>
                            <small class="text-center text-info">All users Who Have Not Voted will appear here if
                                available</small>

                            <hr>
                        </div>
                    @endforelse

                </tbody>

            </table>
        </div>
        @include('layouts.datatables')
    </div>
@endsection
