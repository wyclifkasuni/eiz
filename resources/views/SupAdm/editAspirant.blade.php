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

                                @isset($aspirant->profile->aspirant_id)
                                    <p class="text-muted mb-4"> {{ $aspirant->Profile->bio }} </p>
                                @endisset
                                @empty($aspirant->profile->aspirant_id)
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
                                        <p class="mb-0">Position Viewing </p>
                                    </div>
                                    <div class="col-sm-9">
                                        @isset($aspirant->Aspirant)
                                            <p class="text-muted mb-0">{{ $aspirant->Aspirant->Category->name }}</p>
                                        @endisset

                                        @empty($aspirant->Aspirant)
                                            <p class="text-muted text-warning mb-0">{{ __('NO POSITION CHOSEN') }}</p>
                                            <span>
                                                <form action="{{ route('storeAspirant', $aspirant) }}" method="post">
                                                    @csrf

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="select w-auto">
                                                                <label id="position_label" for="position">Assign
                                                                    Position</label>
                                                                <div class="input-group mb-3">

                                                                    <select id="position" name="position"
                                                                        class="form-control form-select text-body"
                                                                        aria-label="">
                                                                        @forelse ($position as $position)
                                                                            <option value="{{ $position->id }}"> {{ $position->name }}</option>
                                                                        @empty
                                                                            <mark>NO POSITIONS CURRENTLY TO SHOW</mark>
                                                                        @endforelse
                                                                        @error('position')
                                                                            <p class="text-danger">{{ $message }}</p>
                                                                        @enderror
                                                                    </select>


                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <button class="btn-inverse-success rounded">Allocate
                                                                Position</button>
                                                        </div>
                                                    </div>



                                                </form>
                                            </span>
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
