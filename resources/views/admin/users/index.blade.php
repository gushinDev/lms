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
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Order number</th>
                <th scope="col">Route name</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            {{--                    @foreach($navigationMenu as $item)--}}
            {{--                        <tr style="vertical-align: baseline">--}}
            {{--                            <td>{{$item->menu_item_name}}</td>--}}
            {{--                            <td>{{$item->order_number}}</td>--}}
            {{--                            <td>{{$item->route_name}}</td>--}}
            {{--                            <td>--}}
            {{--                                <form action="{{route('navigation.delete-item')}}" method="post">--}}
            {{--                                    @csrf @method('delete')--}}
            {{--                                    <input type="hidden" name="menu_item" value="{{$item->navigation_bar_id}}">--}}
            {{--                                    <button type="submit" class="btn"><i class="fa fa-trash"></i></button>--}}
            {{--                                </form>--}}
            {{--                            </td>--}}
            {{--                        </tr>--}}
            {{--                    @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
