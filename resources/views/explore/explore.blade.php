@extends('layouts.app')

@section('content')
    @if(count($recentlyVisited) > 0)
    <ul>
        <li>Recently visited</li>
        @forelse($recentlyVisited as $user)
            <li class="mt-2">
                <div>
                    <a href="{{$user->path()}}" class="flex items-center text-sm">
                        <img src="{{$user->getAvatar()}}" alt="" class="rounded-full mr-2" width="40" height="40">
                        {{$user->username}}



                        <x-common-followers :user="$user"></x-common-followers>
                    </a>

                </div>
            </li>
        @empty
            <li v-else>No users yet!</li>
        @endforelse
    </ul>
    <br>
    @endif
    <ul>
        <li>Explore users</li>
        @forelse($users as $user)
        <li class="mt-2">
            <div>
                <a href="{{$user->path()}}" class="flex items-center text-sm">
                    <img src="{{$user->getAvatar()}}" alt="" class="rounded-full mr-2" width="40" height="40">
                    {{$user->username}}
                    <x-common-followers :user="$user"></x-common-followers>
                </a>

            </div>
        </li>
        @empty
        <li v-else>No users yet!</li>
        @endforelse
    </ul>
@endsection
