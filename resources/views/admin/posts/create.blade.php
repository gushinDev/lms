@extends('admin.index')

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/codex-editor.js'])
    @include('admin.components.content-header', ['header_name' => 'Create new post'])
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="input-group mb-3 input-group-lg">
                <span class="input-group-text" id="basic-addon1">Title</span>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Short description</span>
                <textarea class="form-control" name="short_description"></textarea>
            </div>
            <div id="editorjs" class="bg-gray-50 border border-gray-100"></div>
            <button type="submit" class="mt-2 btn btn-secondary w-100">Submit</button>
        </form>
    </div>
@endsection
