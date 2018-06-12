@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#">{{$thread->creator->name}}</a> posted:
                        {{$thread->title}}</div>

                    <div class="card-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @if(auth()->check())
        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-md-8">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <textarea name="body" id="body" placeholder="Have something to say?" rows="5" style="width: 100%;"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Post</button>
                </form>
            </div>
        </div>
        @else
            <br><p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discussion</p>
        @endif

    </div>
@endsection
