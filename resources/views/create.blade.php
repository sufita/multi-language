@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-10 col-md-offset-1">
            <form action="{{route('post.store')}}" method="post">
            <h2>{{trans('app.language')}}</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>

                
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
        </div>
    </div>
@endsection