@extends('layouts.dashboard.user')
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
                                @isset($user->Profile->profile)
                                    <img src="{{ asset('images/profile/' . $user->Profile->profile) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                @endisset
                                @empty($user->Profile->profile)
                                    <p>No Profile Image</p>
                                @endempty
                                <h5 class="my-3">{{ $user->name }}</h5>

                                @isset($user->profile->user_id)
                                    <p class="text-muted mb-4"> {{ $user->Profile->bio }} </p>
                                @endisset
                                @empty($user->profile->user_id)
                                    <p class="text-muted mb-4 text-danger text-bold">Make Your Profile Outstanding <br> Create
                                        Your Bio Infornmation.</p>
                                @endempty

                                <div class="d-flex justify-content-center mb-2">
                                    @isset($user->profile->user_id)
                                        <a href="{{ route('Profile.edit', $user->Profile->id) }}"
                                            class="btn btn-outline-primary">Update Bio
                                            Info</a>
                                    @endisset
                                    @empty($user->profile->user_id)
                                        <a href="{{ route('Profile.create') }}" class="btn btn-outline-primary">Create Bio
                                            Info</a>
                                    @endempty

                                </div>
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
                                        <p class="text-muted mb-0">{{ $user->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($user->Profile->phone)
                                            <p class="text-muted mb-0">{{ $user->Profile->phone }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($user->Profile->address)
                                            <p class="text-muted mb-0">{{ $user->Profile->address }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($user->Profile->gender)
                                            <p class="text-muted mb-0">{{ $user->Profile->gender }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date Of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($user->Profile->dob)
                                            <p class="text-muted mb-0">{{ $user->Profile->dob }}</p>
                                        @endisset
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>

                    </div>

                    {{--  --}}
                </div>

            </div>
        </div>
    </main>
@endsection
