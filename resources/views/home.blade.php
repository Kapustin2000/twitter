@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <tweet-create :csrf="'{{csrf_token()}}'" :route="'{{route('tweet-create')}}'"></tweet-create>
        <tweets-wall :tweets="{{$tweets}}"></tweets-wall>
    </div>
</div>
@endsection
