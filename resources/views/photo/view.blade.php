@extends('layouts.app')

@section('content')
    <div>{{ $photo->title }}</div>
    <div>{{ $photo->description }}</div>
    <div>{{ $photo->created_at }}</div>

    <div class="tags">
        @each('tags.item', $photo->tags, 'tag')
    </div>

    <div>
        @each('helpers.button', $actions, 'action')
    </div>


@endsection

