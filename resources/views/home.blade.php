@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-tweet-create></x-tweet-create>
    @forelse($tweets as $tweet)
            <x-tweet :tweet="$tweet"></x-tweet>
        @empty
            <p>No replies</p>
        @endforelse
    </div>
</div>
@endsection
