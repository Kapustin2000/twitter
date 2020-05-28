@extends('layouts.app')

@section('content')
<div class="container">
       <profile-show :user="{{$user}}" :auth-user="{{json_encode(Auth::user())}}" :is-following="{{Auth::user()->following($user)}}"></profile-show>
       <tweets :tweets="{{$user->tweets}}" :profile="true"></tweets>
</div>
@endsection
