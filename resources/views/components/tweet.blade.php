<div class="flex p-4 border-b border-b-gray-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{$tweet->user->path()}}">
            <img src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="" class="rounded-full mr-2" width="50" height="50">
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-2">
            <a href="{{$tweet->user->path()}}">
                {{ $tweet->user->name }}
            </a>
        </h5>

        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>

        <div class="flex">
            <x-like-buttons :tweet="$tweet"></x-like-buttons>
        </div>

    </div>
</div>
