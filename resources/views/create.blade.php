@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Post</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/create')}}">
                            {{ csrf_field() }}


                            <textarea name='postcontent' require></textarea>

                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
