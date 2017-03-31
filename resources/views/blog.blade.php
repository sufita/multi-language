@extends('layouts.app')

@section('content')
  <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($posts as $post)
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                    </div>

                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                    {{-- <div class="panel-footer text-right">
                        <a href="{{ route('post.show', $post->slug) }}">
                            {{ trans('app.view_more') }}
                        </a>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection