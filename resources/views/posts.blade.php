@extends('index')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($posts as $post)
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src="..." alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{$post->getCutContent()}}</p>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <a href="#" class="btn btn-secondary btn-sm">Read</a>
                                    <small class="text-end text-body-secondary">{{$post->duration}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$posts->onEachSide(0)->links()}}
        </div>
    </div>
@endsection
