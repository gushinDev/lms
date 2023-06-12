@extends('admin.index')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exports</h1>
    </div>
    @include('admin.messages')
    <div class="table-responsive mt-2">
        <table class="table table-striped table-sm table-hover table-bordered ">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Type</th>
                <th scope="col" class="text-center">File name</th>
                <th scope="col" class="text-center">Progress</th>
                <th scope="col" class="text-center">Download</th>
            </tr>
            </thead>
            <tbody>
            @foreach($exports as $export)
                <tr style="vertical-align: baseline">
                    <td class="text-center">{{$export->export_id}}</td>
                    <td class="text-center">{{$export->export_type}}</td>
                    <td class="text-center">{{$export->file_name}}</td>
                    <td class="text-center">{{$export->progress}}</td>
                    <td class="text-center">{{$export->download_link}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$exports->onEachSide(0)->links()}}
    </div>
@endsection
