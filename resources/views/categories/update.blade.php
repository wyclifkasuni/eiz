@extends('layouts.dashboard.adm')
@section('body')
    {{-- content --}}
    
        <div class="card">
            <div class="card-body">

                <form class="forms-sample" action="{{ route('categories.update',$category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="exampleInputname" class="col-sm-3 col-form-label">Level Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" autofocus
                                class="form-control text-light @error('name') border-danger @enderror
                        
                   "
                                id="exampleInputname" placeholder="Categroy Name" value="{{ $category->name }}">
                            @error('name')
                                <small class="text-danger text-bold">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputname" class="col-sm-3 col-form-label">Level Description</label>
                        <div class="col-sm-9">
                            <textarea id="" name="description" rows="5"
                                class="form-control text-light @error('description') border-danger @enderror"
                                placeholder="Enter Category Description">{{ $category->description }}</textarea>
                            @error('description')
                                <small class="text-danger text-bold">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update Record</button>
                    <button class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
   
@endsection
