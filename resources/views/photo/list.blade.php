@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->


<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')


    <div class="form-group">
        <div class="col-sm-6 center-block" style="float:none;">

            <!-- Current Tasks -->

            <div class="panel panel-default">
                <div class="panel-body">

                    @if (count($photos) > 0)
                        <table class="table table-striped task-table">

                            <!-- Table Headings -->
                            <!-- Table Body -->
                            <tbody>
                            @foreach ($photos as $photo)
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text">
                                        <div class="image">
                                            <a href="{{ url('/photo/'.$photo->id) }}">
                                                <img src="{{ $photo->url }}" />
                                            </a>
                                        </div>
                                        <div class="user"><a href="{{ url('/profile/'.$photo->user->id)  }}">{{ $photo->user->name }}</a></div>
                                        <div class="text"><a href="{{ url('/photo/'.$photo->id) }}">{{ $photo->title }} {{ $photo->id }}</a></div>
                                        <div class="tags">
                                            @each('tags.item', $photo->tags, 'tag')
                                        </div>
                                        <div class="time">{{ $photo->created_at->format('M d Y H:i') }}</div>
                                    </td>

                                    <!-- Delete Button -->

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TODO: Current Tasks -->
@endsection