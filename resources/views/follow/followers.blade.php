@extends('layouts.app')

@section('content')
    <ul>
        @forelse($followers as $follower)
            <li class="mt-2">
                <div>
                    <a href="{{$follower->path()}}" class="flex items-center text-sm">
                        <img src="{{$follower->getAvatar()}}" alt="" class="rounded-full mr-2" width="40" height="40">
                        {{$follower->username}}



                        <x-common-followers :user="$follower"></x-common-followers>
                        <x-follow-button :user="$follower"></x-follow-button>

                    </a>

                </div>
            </li>
        @empty
            <li v-else>No users yet!</li>
        @endforelse
    </ul>
@endsection
