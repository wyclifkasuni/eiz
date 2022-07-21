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
                                @isset($aspirant->Profile->profile)
                                    <img src="{{ asset('images/profile/' . $aspirant->Profile->profile) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                @endisset
                                @empty($aspirant->Profile->profile)
                                    <p>No Profile Image</p>
                                @endempty
                                <h5 class="my-3">{{ $aspirant->name }}</h5>

                                @isset($aspirant->profile->bio)
                                    <p class="text-muted mb-4"> {{ $aspirant->Profile->bio }} </p>
                                @endisset
                                @empty($aspirant->profile->bio)
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
                                        <p class="text-muted mb-0">{{ $aspirant->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $aspirant->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Profile->phone)
                                            <p class="text-muted mb-0">{{ $aspirant->Profile->phone }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Profile->address)
                                            <p class="text-muted mb-0">{{ $aspirant->Profile->address }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Profile->gender)
                                            <p class="text-muted mb-0">{{ $aspirant->Profile->gender }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date Of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Profile->dob)
                                            <p class="text-muted mb-0">{{ $aspirant->Profile->dob }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Position Viewing </p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Aspirant)
                                            <p class="text-muted mb-0">{{ $aspirant->Aspirant->Category->name }}</p>
                                        @endisset

                                        @empty($aspirant->Aspirant)
                                        <p class="text-muted text-warning mb-0">{{ __('NO POSITION CHOSEN') }}</p>
                                        @endempty
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{--  --}}
                </div>

            </div>
        </div>
    </main>
@endsection
