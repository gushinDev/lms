@extends('admin.index')

@section('content')
    @include('admin.components.content-header', ['header_name' => 'Exports'])
    @include('admin.messages')
    <div class="table-responsive mt-2">
        <table class="table table-striped table-sm table-hover table-bordered ">
            <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Type</th>
                <th scope="col" class="text-center">File name</th>
                <th scope="col" class="text-center">Progress</th>
                <th scope="col" class="text-center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($exports as $export)
                <tr style="vertical-align: baseline">
                    <td class="text-center">{{$export->export_id}}</td>
                    <td class="text-center">{{$export->export_type}}</td>
                    <td class="text-center">{{$export->file_name}}</td>
                    <td class="text-center text-white bg-opacity-75" >
                        @if($export->progress === 100)
                            <a class="btn btn-success p-1" href="{{route('export.download', ['export_id' => $export->export_id])}}">Download</a>
                        @else
                            <button class="btn btn-warning">{{'In progress'}}</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$exports->onEachSide(0)->links()}}
    </div>
@endsection
