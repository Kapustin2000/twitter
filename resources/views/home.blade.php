@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-tweet-create></x-tweet-create>
        <x-tweets-wall :tweets="$tweets"></x-tweets-wall>
    </div>
</div>
@endsection
