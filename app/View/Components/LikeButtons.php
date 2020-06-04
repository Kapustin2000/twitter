<?php

namespace App\View\Components;

use App\Models\Tweet;
use Illuminate\View\Component;

class LikeButtons extends Component
{
    public $tweet;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.like-buttons');
    }
}
