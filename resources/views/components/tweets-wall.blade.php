@forelse($tweets as $tweet)
    <x-tweet :tweet="$tweet"></x-tweet>
@empty
    <p>No replies</p>
@endforelse