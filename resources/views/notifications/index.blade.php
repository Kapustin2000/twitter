@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <ul>
                    @foreach($notifications as $notification)

                        @if($notification->type === 'App\Notifications\NewFollower')
                             <li class="mt-2">
                                 <div>
                                     <a href="{{$notification->data['path']}}" class="flex items-center text-sm">
                                         <img src="{{$notification->data['avatar'] }}" alt="" class="rounded-full mr-2" width="40" height="40">
                                         You have new follower {{$notification->data['username'] }}
                                     </a>
                                 </div>
                             </li>
                        @endif
                    @endforeach
            </ul>


        </div>
    </div>
@endsection
