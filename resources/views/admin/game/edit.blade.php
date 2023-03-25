@extends('admin.layout.master')
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf
            @method('put')
          <div class="mb-3">
            <label for="forName" class="form-label">Name</label>
            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="forName" autocomplete="off" placeholder="Category Name">
          </div>
          <div class="mb-3">
            <label for="exampleInputPhoto" class="form-label">Photo</label>
            <input type="file" name="thumbnail" class="form-control" id="exampleInputPhoto" >
          </div>

          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-secondary">Cancel</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
  <!-- Page content here -->
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
@endpush
