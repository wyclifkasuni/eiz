@extends('layouts.dashboard.adm')
@section('body')
    {{-- content --}}

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                   <h5>Level Name: </h5> <hr>
                    {{ $category->name }}
                </div>
                <div class="col">
                    <h5>Level Description: </h5> <hr>
                    {{ $category->description }}
                </div>
            </div>
            <a class="btn btn-inverse btn-success" href="{{ route('categories.index') }}">Exit</a>
        </div>
    </div>
@endsection