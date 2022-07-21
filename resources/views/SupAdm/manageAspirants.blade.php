@extends('layouts.dashboard.adm')
@section('body')
<div class="card">
    <div class="card-header float-end text-dribbble text-end">Delete to mark Position Empty</div>
    <div class="table-responsive">
        <table class="table table-bordered table-contextual table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th>Profile </th>
                    <th class="text-warning"> Full Name(s)</th>
                    <th> Email Address</th>
                    <th>Vying Position</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aspirants as $aspirant)
                    <tr>
                        <td>
                            @isset($aspirant->User->Profile->profile)
                                <img class="img-xs rounded-circle "
                                    src="{{ asset('images/profile/' . $aspirant->User->Profile->profile) }}" alt="Profile">
                            @endisset
                        </td>

                        <td> {{ $aspirant->User->name }}</td>
                        <td class="text-truncate" style="max-width: 80px"> {{ $aspirant->User->email }} </td>
                        <td>
                            {{ $aspirant->Category->name }}
                        </td>

                        <td>
                            <form action="{{ route('deletePositionforAspirant', $aspirant) }}" method="post">

                                @csrf
                                @method('DELETE')

                                @if (Auth::user()->hasRole('supadm'))
                                    <button
                                        class="active bg-danger btn-danger btn-outline-behance btn-sm mdi mdi-delete-forever s sb1 "
                                        type="submit"
                                        onclick=" return confirm('Are yo Sure to Delete this Aspirant Associated Position?')"></button>
                                @endif

                            </form>
                        </td>
                    </tr>

                @empty
                    <div class="card-body">
                        <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                <h3>No Available Aspirants Positions</h3>
                            </span></h1>

                        <hr>
                        <small class="text-center text-info">All Aspirants Assigned Positions will appear here if
                            available</small>

                        <hr>
                    </div>
                @endforelse

            </tbody>

        </table>
    </div>
    </div>
@endsection
