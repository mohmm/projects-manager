@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm">Create project</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project as $project)
                                <tr>
                                    <th scope="row">{{ $project->id }}</th>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->category->name }}</td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ route('project.delete', $project->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
