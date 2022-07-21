@extends('layouts.dashboard.adm')
@section('body')
    <main>
        <div class="container">
            <div class="card card-outline-success">
                <form action="{{ route('Profile.update', $user->profile->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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

                                    <hr>

                                    <div class="form-check mb-3">
                                        <label id="bio_label" for="bio" class="required text-warning">My Bio</label>
                                        <textarea id="bio" name="bio" rows="5" class="form-control">{{ $user->Profile->bio }}</textarea>
                                        @error('bio')
                                            <small class="text-bold text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <hr>

                                    {{-- profile picture --}}
                                    <div class="file-upload">
                                        <label class="text-info" for="profile">Profile Image</label>
                                        <div class="custom-file">
                                            <div class="input-group mb-3">
                                                <input id="profile" name="profile" type="file"
                                                    class="custom-file-input form-control" aria-label="File Upload"
                                                    autofocus />
                                                <img src="{{ asset('images/profile/' . $user->Profile->profile) }}" alt=""
                                                    width="30px">

                                                @error('profile')
                                                    <small class="text-bold text-danger"> {{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end --}}


                                    <div class="d-flex justify-content-between mb-2">

                                        <button type="submit" class="btn btn-outline-primary ms-1">Update Profile</button>
                                        <span> <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a></span>

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
                                            <input id="name" name="name" type="text" class="form-control bg-secondary"
                                                value="{{ $user->name }}" placeholder="Full Names" autofocus required
                                                readonly />

                                            @error('name')
                                                <small class="text-bold text-danger"> {{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">

                                            <input id="name" name="email" type="text" class="form-control bg-secondary"
                                                value="{{ $user->email }}" placeholder="Full Names" autofocus required
                                                readonly />

                                            @error('email')
                                                <small class="text-bold text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">

                                            <input id="name" name="phone" type="text" class="form-control"
                                                value="{{ $user->Profile->phone }}" placeholder="Phone Number" autofocus
                                                required />

                                            @error('phone')
                                                <small class="text-bold text-danger"> {{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">

                                            <input id="name" name="address" type="text" class="form-control"
                                                value="{{ $user->Profile->address }}" placeholder="Your Address"
                                                autofocus required />

                                            @error('address')
                                                <small class="text-bold text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" id="gender"
                                                        value="Male">
                                                    Male<i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" id="gender"
                                                        value="Female">
                                                    Female <i class="input-helper"></i></label>
                                            </div>
                                        </div>

                                        @error('gender')
                                            <small class="text-bold text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Date Of Birth</p>
                                        </div>
                                        <div class="col-sm-9">

                                            <input id="name" name="dob" type="date" class="form-control"
                                                value="{{ $user->Profile->dob }}" placeholder="Date Of Birth" autofocus
                                                required />

                                            @error('dob')
                                                <small class="text-bold text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label id="user_id_label" for="user_id"></label>
                                        <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}"
                                            class="form-control" />
                                    </div>
                                    <hr>


                                </div>
                            </div>

                        </div>

                        {{--  --}}
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
