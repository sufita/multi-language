@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-10 col-md-offset-1">
            <form action="{{route('post.store')}}" method="post">
                <div class="form-group">
                    <label for="titleen">Title (English)</label>
                    <input type="text" name="titleen" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="titleid">Title (INDONESIAN)</label>
                    <input type="text" name="titleid" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug(ENGLISH)</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="slugid">Slug (INDONESIAN)</label>
                    <input type="text" name="slugid" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="contenten">Content (ENGLISH)</label>
                    <textarea name="contenten" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="contentid">Content (INDONESIAN)</label>
                    <textarea name="contentid" class="form-control" required></textarea>
                </div>

                
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
        </div>
    </div>
@endsection