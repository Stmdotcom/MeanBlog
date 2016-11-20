@extends('layouts.app')

@section('scriptinject')
    <script>
        var closeAlert = function(){
            $('.alert').hide();
        }
    </script>
@endsection

@section('navcontent')
    <li><a href="{{ url('/create') }}">+ Create Post</a></li>
@endsection

@section('alert')
    @if (session('successmessage'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{session('successmessage')}} <div class="alert-close" onclick="closeAlert()">Close</div>
        </div>
    @endif
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Posts</div>
                <div class="panel-body">

                     @foreach (Auth::user()->posts as $apost)
                        <div class="row">
                        <div class="col-md-8 meanblog-editblock">
                        {{$apost->content}}
                            </br>
                        Created At: {{$apost->created_at}}
                        </div>
                            <div class="col-md-4">
                                <a href="{{ url('/edit/' . $apost->id) }}">Edit</a>
                            </div>
                        </div>
                     @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
