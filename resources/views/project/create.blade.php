@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create project</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('project.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
                            @error('name')
                                <div class="alert alert-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea name="description" id="description" class="form-control" value="{{ old('description') }}"></textarea>
                            @error('description')
                                <div class="alert alert-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="project-category-id">Project category</label>
                            <select class="form-control" name="project_category_id" id="project-category-id">
                                <option value="0">Please select a category</option>
                                @foreach($projectCategories as $projectCategory)
                                    <option value="{{ $projectCategory->id }}">{{ $projectCategory->name }}</option>
                                @endforeach
                            </select>
                            @error('project_category_id')
                                <div class="alert alert-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
