@extends('layouts.app')

@section('page-title', $project->title)
@section('content')
  <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to all projects</a>
  <br>
  {{-- @dump($project->type?->label) --}}

  <span class="badge rounded-pill"
    style="background-color: {{ $project->type?->color ?? 'black' }}">{{ $project->type?->label ?? 'No type' }}</span>

  <img src="{{ $project->getImageThumb() }}" alt="Project Thumbnail" width="240px" class="d-block my-4">
  <p><strong>Description:</strong><br> {{ $project->description }}</p>
@endsection
