@extends('layouts.dashboard.user')
@section('body')
    
{{-- Push Selected Voter to Database --}}
<div class="py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    @csrf
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @forelse ($aspirants as $aspirant)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100 bg-body">
                                    <!--  image-->
                                    @isset($aspirant->User->Profile->profile)
                                        <a href="{{ route('Vote1',$aspirant) }}"><img
                                                src="{{ asset('images/profile/' . $aspirant->User->Profile->profile) }}"
                                                alt="avatar" class="card-img-top"></a>
                                    @endisset
                                @empty($aspirant->User->Profile->profile)
                                <a href="{{ route('Vote1',$aspirant) }}"><img
                                    src="{{ asset('assets/images/demo.jpg') }}"
                                    alt="avatar" class="card-img-top"></a>
                                @endempty
                                <!-- Aspirant details-->
                                <div class="card-body p-2">
                                    <div class="text-center">
                                        <!-- Aspirant name-->
                                        <strong class="text-primary">VOTE
                                            <h3 class="fw-bolder text-info">{{ $aspirant->User->name }}</h3>
                                            <hr> FOR <span
                                                class="h3 text-dribbble">{{ $aspirant->Category->name }}</span>
                                        </strong>

                                    </div>
                                </div>

                            </div>
                        </div>

                    @empty
                        <div class="card-body">
                            <div class="h1">No ASPIRANTS TO VOTE FOR</div>
                        </div>
                    @endforelse


                    {{--  --}}

                </div>
            </form>
        </div>
    </div>
</div>
</div>

{{-- end --}}

{{-- end --}}
@endsection
