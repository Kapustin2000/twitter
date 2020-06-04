<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse($friends as $friend)
            <li class="mt-2">
                <div>
                    <a class="flex items-center text-sm">
                        <img src="http://127.0.0.1:8000/images/default-avatar.jpeg" alt="" class="rounded-full mr-2" width="40" height="40">
                        {{$friend->userName}}
                    </a>
                </div>
            </li>
        @empty
            <li>No friends yet!</li>
        @endforelse
    </ul>
</div>