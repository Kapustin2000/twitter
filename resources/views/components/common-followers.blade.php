
    @if($commonFollowers = $user->commonFollowers())

    @foreach($commonFollowers->slice(0,2) as $follower)
            @if($loop->first)
                Common followers:
            @endif
            <a href="{{$follower->path()}}">{{$follower->username}}</a>
    @endforeach

    @if($countCommonFollowers = $commonFollowers->count() - 2 > 0)
         (+{{$countCommonFollowers}})
    @endif
    @endif