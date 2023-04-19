@extends('layouts.app')

@section('page-title', 'Edit ' . $project->title)

@section('content')
  <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
    </div>
    <div class="mb-3">
      <label for="thumbnail" class="form-label">Thumbnail</label>
      <input type="file" class="form-control" id="thumbnail" name="thumbnail">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
@endsection
