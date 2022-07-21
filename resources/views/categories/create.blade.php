@extends('layouts.dashboard.adm')
@section('body')
{{-- content here --}}


<div class="card">
    <div class="card-body w-75">
      <h4 class="card-title">Aspirant Level Centre</h4>
      <p class="card-description"> Aspirant Level </p>
      <form class="forms-sample" action="{{ route('categories.store') }}" method="POST">        
        @csrf
        <div class="form-group row">
          <label for="exampleInputname" class="col-sm-3 col-form-label">Level Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" autofocus class="form-control @error('name') border-danger @enderror
                
           " id="exampleInputname" placeholder="Categroy Name" value="{{ old('name') }}">
            @error('name')
            <small class="text-danger text-bold">{{ $message }}</small>
        @enderror
          </div>
        </div>
        <div class="form-group row">
            <label for="exampleInputname" class="col-sm-3 col-form-label">Level Description</label>
            <div class="col-sm-9">
            <textarea id="" name="description" rows="5" class="form-control text-light @error('description') border-danger @enderror" placeholder="Enter Category Description">{{ old('description') }}</textarea>
        @error('description')
            <small class="text-danger text-bold">{{ $message }}</small>
        @enderror
        </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <a href="{{ route('categories.index') }}" class="btn btn-dark">Cancel</a>
      </form>
    </div>
  </div>

{{-- end --}}
@endsection