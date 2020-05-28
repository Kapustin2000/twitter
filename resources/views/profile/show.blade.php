@extends('layouts.app')

@section('content')
<div class="container">
       <profile-show :user="{{$user}}" :auth-user="{{json_encode(Auth::user())}}" :is-following="{{json_encode(Auth::user()->following($user))}}"></profile-show>
       <tweets-wall :tweets="{{$user->tweets}}" :user="{{$user}}"></tweets-wall>
</div>
@endsection
