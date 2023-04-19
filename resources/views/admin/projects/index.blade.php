@extends('layouts.app')

@section('page-title', 'Projects')
@section('content')
  {{-- @dump($projects) --}}
  <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create Project</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
        <tr>
          <th scope="row">{{ $project->id }}</th>
          <td>{{ $project->title }}</td>
          <td>{{ $project->getAbstract() }}</td>
          <td>{{ $project->thumbnail }}</td>
          <td>
            <a href="{{ route('admin.projects.show', $project) }}" class="btn p-0">
              <i class="bi bi-box-arrow-in-up-right"></i>
            </a>
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn p-0">
              <i class="bi bi-pencil-square"></i>
            </a>
            <button type="button" class="btn p-0" data-bs-toggle="modal"
              data-bs-target="#exampleModal-{{ $project->id }}">
              <i class="bi bi-trash text-danger"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('modals')
  @foreach ($projects as $project)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Remove {{ $project->title }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this element?<br>
            This action is irreversible!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, go back</button>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                Yes, delete
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection
