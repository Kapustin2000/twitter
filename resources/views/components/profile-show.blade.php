<div>
    <header class="mb-6 relative">
        <div class="relative">
            <img src="{{$user->getBanner()}}"
                 alt=""
                 class="mb-2"
            >

            <img src="{{$user->getAvatar()}}"
                 alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans()}}</p>
                <p class="text-sm"><x-common-followers :user="$user"></x-common-followers></p>
            </div>

            <div class="flex">
                <a href="{{$user->path('follows')}}"
                   class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                >
                     Follows {{$user->follows()->count()}}
                </a>
                <a href="{{$user->path('followers')}}"
                   class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                >
                    Following {{$user->followers()->count()}}
                </a>
                @can('edit', $user)
                <a href="{{$user->path('edit')}}"
                    class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                >
                    Edit Profile
                </a>
                @else
                <x-follow-button :user="$user"></x-follow-button>
                @endcan
            </div>
        </div>

        <p class="text-sm">
            {{$user->about}}
        </p>


    </header>
</div>