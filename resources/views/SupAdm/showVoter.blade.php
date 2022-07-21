@extends('layouts.dashboard.adm')
@section('body')
    <main>

        <div class="container">
            <div class="card card-outline-primary">
                <div class="mt-2 text-gray text-center"><strong>Bio Information</strong></div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                @isset($voter->Profile->profile)
                                    <img src="{{ asset('images/profile/' . $voter->Profile->profile) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                @endisset
                                @empty($voter->Profile->profile)
                                    <p>No Profile Image</p>
                                @endempty
                                <h5 class="my-3">{{ $voter->name }}</h5>

                                @isset($voter->profile->bio)
                                    <p class="text-muted mb-4"> {{ $voter->Profile->bio }} </p>
                                @endisset
                                @empty($voter->profile->bio)
                                    <p class="text-muted mb-4 text-danger text-bold">No Bio Information Set <br> <small>
                                            Bio Infornmation will appear Here </small>.</p>
                                @endempty


                            </div>
                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $voter->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $voter->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($voter->Profile->phone)
                                            <p class="text-muted mb-0">{{ $voter->Profile->phone }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($voter->Profile->address)
                                            <p class="text-muted mb-0">{{ $voter->Profile->address }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($voter->Profile->gender)
                                            <p class="text-muted mb-0">{{ $voter->Profile->gender }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date Of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($voter->Profile->dob)
                                            <p class="text-muted mb-0">{{ $voter->Profile->dob }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <a class="btn btn-inverse-success rounded" href="{{ route('voters') }}">Exit</a>
                                
                            </div>
                        </div>

                    </div>

                    {{--  --}}
                </div>

            </div>
        </div>
    </main>
@endsection
