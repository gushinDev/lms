@extends('admin.index')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                This week
            </button>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover table-bordered ">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr style="vertical-align: baseline">
                    <td class="text-center">{{$user->user_id}}</td>
                    <td class="text-center">{{$user->username}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td style="display: flex; align-items: center; justify-content: center">
                        <a href="{{route('users.edit', ['user_id' => $user->user_id])}}"><i class="fa fa-edit"
                                                                                            style="color: #1a202c"></i></a>
                        @if(Auth::id() !== $user->user_id)
                            <form action="{{route('users.delete')}}" method="post" id="delete-form[{{$user->user_id}}]">
                                @csrf @method('delete')
                                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                <button type="submit" class="btn btn-delete"><i class="fa fa-trash"></i></button>
                            </form>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->onEachSide(0)->links()}}
    </div>
    @include('admin.users.scripts')
@endsection
