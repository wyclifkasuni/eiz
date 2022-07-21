@extends('layouts.dashboard.adm')
@section('body')
    {{-- logic here --}}
    <form action="{{ route('reports') }}" method="GET">
        @csrf
             <div class="row">
            <div class="col-md-3"><label id="category_label" for="category">Position</label></div>
            <div class="col-md-6">

                <div class="input-group mb-3">
                    <select id="category" name="category" class="form-control form-select" aria-label="">
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        
                        @endforeach
                        
                    </select>
                </div>

            </div>
            <div class="col-md-3">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>
    <div class="card">
        {{-- <div class="card-header">  {{ $category->name }} Report:</div> --}}
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Position</th>
                            <th>Vote Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
