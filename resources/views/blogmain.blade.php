@extends('layouts.app')

@section('title', 'The Posts')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">The Posts!</div>
                    <div class="panel-body">
                        @foreach ($posts as $apost)
                            <div class="meanblog-postblock">
                                <div class="meanblog-body">{{$apost->content}}</div>

                                <div class="meanblog-footer">
                                    @if (isset($apost->created_at))
                                        <div class="float-left">At: {{$apost->created_at}}</div>
                                    @endif
                                    @if (isset($apost->user))
                                        <div  class="float-right"> By : {{$apost->user->name}}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection