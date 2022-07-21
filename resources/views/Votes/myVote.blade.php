@extends('layouts.dashboard.user')
@section('body')
    {{-- content goes Here --}}
    <div class="container-fluid">
        <div class="card-body">
            <div class="card-header">My Votes Preview</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="tab-content table table-bordered table-hover table-striped">
                        <thead class="badge-outline-success">
                            <tr>
                                <th>Candidate Name</th>
                                <th>Candidate Position</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MyVotes as $Vote)
                                <tr>
                                    <td>{{ $Vote->Aspirant->User->name }}</td>
                                    <td>{{ $Vote->Category->name }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="float-end">
                    <a class="btn btn-inverse-success btn-lg m-1 rounded text-lg-center text-muted" href="{{ route('dashboard') }}">Dasboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection
