@extends('layouts.app')

@section('page-title', 'Create Project')

@section('content')
  <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="type_id" class="form-label">Type</label>
      <select class="form-select" name="type_id" id="type_id">
        <option value="">No type</option>
        @foreach ($types as $type)
          <option value="{{ $type->id }}">{{ $type->label }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="thumbnail" class="form-label">Thumbnail</label>
      <input type="file" class="form-control" id="thumbnail" name="thumbnail">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
