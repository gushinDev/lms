@extends('admin.index')

@section('content')
    @include('admin.components.content-header', ['header_name' => 'Posts'])
    @include('admin.messages')
    <div class="table-responsive mt-2">
        <table class="table table-striped table-sm table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col" class="text-center">
                    <a href="">#</a>
                </th>
                <th scope="col" class="text-center">
                    <a href="">Authors</a>
                </th>
                <th scope="col" class="text-center">
                    <a href="">Title</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr style="vertical-align: baseline">
                    <td class="text-center">{{$post->post_id}}</td>
                    <td class="text-center"></td>
                    <td class="text-center">{{$post->title}}</td>
                    <td style="display: flex; align-items: center; justify-content: center">
                        <a href="">
                            <i class="fa fa-edit" style="color: #1a202c"></i>
                        </a>
                        <form action="" method="post" id="delete-form[]">
                            @csrf @method('delete')
                            <input type="hidden" name="user_id" value="">
                            <button type="submit" class="btn btn-delete"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$posts->onEachSide(0)->links()}}
    </div>
@endsection
