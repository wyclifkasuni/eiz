@extends('layouts.dashboard.adm')
@section('body')
    <main>
        {{-- Voters --}}

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All System Categories</h4>
                <p class="card-description"> Categories Preview
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-icon-text">
                        <i class="mdi mdi-briefcase-upload btn-icon-prepend"></i> New Category </a>
                    {{-- Check if user is Super Administrator --}}

                </p>
                <div class="table-responsive">
                    <table class="table table-bordered table-contextual table-dark table-hover table-striped">
                        <thead>
                            <tr>
                                <th># </th>
                                <th>Created</th>
                                <th class="text-warning"> Name(s)</th>
                                <th class="text-info"> Description </th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }} </td>
                                    <td class="text-success text-bold"> {{ $category->created_at->DiffForHumans() }}</td>
                                    <td> <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                                    </td>
                                    <td class="text-truncate" style="max-width: 80px"> {{ $category->description }} </td>


                                    <td>
                                        <form action="{{ route('categories.destroy', $category) }}" method="post">

                                            <a class="mdi mdi-pencil-box-outline mdi-24px text-warning"
                                                href="{{ route('categories.edit', $category) }}"></a>

                                            <a class="mdi mdi-eye mdi-24px text-success"
                                                href="{{ route('categories.show', $category) }}"></a>
                                            @csrf
                                            @method('DELETE')

                                            @if (Auth::user()->hasRole('supadm'))
                                                <button
                                                    class="active bg-danger btn-danger btn-outline-behance btn-sm mdi mdi-delete-forever s sb1 "
                                                    type="submit"
                                                    onclick=" return confirm('Are yo Sure to Delete this Level?')"></button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <div class="card-body">
                                    <h1 class="mdi mdi-alert-outline text-warning text-xl-center"><span>
                                            <h3>No Available Categories</h3>
                                        </span></h1>

                                    <hr>
                                    <small class="text-center text-info">All Categories will appear here if
                                        available</small>

                                    <hr>
                                </div>
                            @endforelse

                        </tbody>

                    </table>

                </div>
                {{-- pagination --}}

                {{ $categories->links('pagination::bootstrap-5') }}

            </div>
        </div>


        {{-- end of event --}}
    </main>
@endsection
