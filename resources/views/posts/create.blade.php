@extends('layouts.app')
@section('title')
    create
@endsection

@section('content')

    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3"> <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3"> <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="user_id" class="form-control">
                <option value="1">Jafar</option>
                <option value="2">Ali</option>
            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection