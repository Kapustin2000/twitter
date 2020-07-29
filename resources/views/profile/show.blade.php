@extends('layouts.app')

@section('content')
<div class="container">
       <x-profile-show :user="$user" :counters="$followersAndFollowsCount"></x-profile-show>
       <x-tweets-wall :tweets="$tweets"></x-tweets-wall>
</div>
@endsection
