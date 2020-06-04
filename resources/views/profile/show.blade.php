@extends('layouts.app')

@section('content')
<div class="container">
       <x-profile-show :user="$user"></x-profile-show>
       <x-tweets-wall :tweets="$user->tweets"></x-tweets-wall>
</div>
@endsection
