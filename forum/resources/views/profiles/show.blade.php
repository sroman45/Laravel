@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div>
                    <h1>
                        {{ $profileUser->name }}
                        <hr class="mt-4 mb-4">
                    </h1>
                </div>

                @foreach($activities as $date => $activity)
                    <h3>{{ $date }}</h3>
                    <hr>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @endforeach

                {{--{{ $threads->links() }}--}}
            </div>
        </div>
    </div>
@endsection