@extends('layouts.app')

@section('content')

        <!-- Bootstrap Boilerplate... -->
<style>
    .time{
        font-size: 8pt;
        float: right;
    }
    .text{
        font-weight: 300;
        margin-bottom: 10px;
    }
    .user{
        font-weight: bold;
    }
</style>

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')


        <div class="form-group">
            <div class="col-sm-6 center-block" style="float:none;">

                <!-- Current Tasks -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Messages
                        </div>

                        <div class="panel-body">

                            <!-- New Message Form -->
                            <div style="height: 50px;">
                            <form action="/larabox/quickstart/public/add" method="POST" class="form-inline">
                                {{ csrf_field() }}

                                <div class="col-sm-6">
                                    <input type="text" name="text" id="message-text" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Send
                                    </button>
                                </div>
                            </form>
                            </div>
                            @if (count($messages) > 0)
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <!-- Table Body -->
                                <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div class="user"><a href="{{ url('/profile/'.$message->user->id)  }}">{{ $message->user->name }}</a></div>
                                            <div class="text">{{ $message->text }}</div>
                                            <div class="time">{{ $message->created_at->format('M d Y H:i') }}</div>
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