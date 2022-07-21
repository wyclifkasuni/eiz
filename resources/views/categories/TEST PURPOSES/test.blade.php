{{-- testing bootstrap design in a table for voters to vote --}}

    {{-- <div class="card card-accent-primary bg-body">
        <div class="card-header"> YOUR Vote Counts <i class="mdi mdi-highway
        "></i> </div>
        <div class="card-body"> --}}
            <div class="py-2">
                <div class="container">

            <div class="table-responsive">
                <table class="table-sm">
                    <tbody>
                        <tr class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                            <div class="col">
                                @forelse ($aspirants as $aspirant)
                                    <td>
                                        <div class="card-body">
                                            @isset($aspirant->User->Profile->profile)
                                                <a href="{{ route('Vote1',$aspirant) }}"><img
                                                        src="{{ asset('images/profile/' . $aspirant->User->Profile->profile) }}"
                                                        alt="avatar" class="card-img-top"></a>
                                            @endisset
                                        @empty($aspirant->User->Profile->profile)
                                            {{-- <p>No Profile Image</p> --}}
                                            {{-- show default image --}}
                                          
                                            <a href="">
                                                <img
                                                src="{{ asset('assets/images/faces/face13.jpg') }}"
                                                alt="avatar" class="card-img-top">

                                            </a>
                                          
                                        @endempty
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
                                </td>
                            @empty
                                <div class="card-body">
                                    <div class="h1">No ASPIRANTS TO VOTE FOR</div>
                                </div>
                            @endforelse

                        </div>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>

{{-- end --}}
<hr class="text-bold text-success">
<hr class="text-bold text-info">


