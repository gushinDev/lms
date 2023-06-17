@extends('admin.index')

@section('content')
    @include('admin.components.content-header', ['header_name' => 'Articles'])
    @include('admin.messages')
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Settings
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form action="{{route('users.export')}}" method="POST">
                        @csrf
                        <div class="input-group w-25">
                            <label class="input-group-text" for="inputGroupSelect01">Export</label>
                            <select class="form-select" id="inputGroupSelect01"
                                    aria-label="Example select with button addon"
                                    name="users_export_file_type">
                                <option selected>Choose...</option>
                                <option value="xlsx">Xlsx</option>
                                <option value="json">Json</option>
                                <option value="csv">Csv</option>
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Start</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
{{--    <div class="table-responsive mt-2">--}}
{{--        <table class="table table-striped table-sm table-hover table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col" class="text-center">--}}
{{--                    <a href="{{route('users.index', ['sort_by' => 'user_id', 'sort_direction' => $sortDirectionId ?? 'asc'])}}">--}}
{{--                        #--}}
{{--                    </a>--}}
{{--                </th>--}}
{{--                <th scope="col" class="text-center">--}}
{{--                    <a href="{{route('users.index', ['sort_by' => 'username', 'sort_direction' => $sortDirectionUsername ?? 'asc'])}}">--}}
{{--                        Username--}}
{{--                    </a>--}}
{{--                </th>--}}
{{--                <th scope="col" class="text-center">--}}
{{--                    <a href="{{route('users.index', ['sort_by' => 'email', 'sort_direction' => $sortDirectionEmail ?? 'asc'])}}">--}}
{{--                        Email--}}
{{--                    </a>--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($users as $user)--}}
{{--                <tr style="vertical-align: baseline">--}}
{{--                    <td class="text-center">{{$user->user_id}}</td>--}}
{{--                    <td class="text-center">{{$user->username}}</td>--}}
{{--                    <td class="text-center">{{$user->email}}</td>--}}
{{--                    <td style="display: flex; align-items: center; justify-content: center">--}}
{{--                        <a href="{{route('users.edit', ['user_id' => $user->user_id])}}">--}}
{{--                            <i class="fa fa-edit" style="color: #1a202c"></i>--}}
{{--                        </a>--}}
{{--                        @if(Auth::id() !== $user->user_id)--}}
{{--                            <form action="{{route('users.delete')}}" method="post" id="delete-form[{{$user->user_id}}]">--}}
{{--                                @csrf @method('delete')--}}
{{--                                <input type="hidden" name="user_id" value="{{$user->user_id}}">--}}
{{--                                <button type="submit" class="btn btn-delete"><i class="fa fa-trash"></i></button>--}}
{{--                            </form>--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        {{$users->onEachSide(0)->links()}}--}}
{{--    </div>--}}
@endsection
