@extends('layouts.app')

@section('content')

<div class="col-sm-6 center-block" style="float:none;">
    <div class="image">
        <img src="{{ $photo->url }}" />
    </div>

    <div>{{ $photo->title }}</div>
    <div>{{ $photo->description }}</div>
    <div><a href="{{ url('/profile/'.$photo->user->id) }}">{{ $photo->user->name }}</a>, {{ $photo->created_at->format('d M Y') }}</div>

    <div class="tags">
        @each('tags.item', $photo->tags, 'tag')
    </div>

    <div class="likes">
        {{ count($photo->likes) }} likes
    </div>

    @if(count($actions))
    <div>
        @each('actions.button', $actions, 'action')
    </div>
    @endif
</div>

@endsection

