<?php

namespace Tests\Feature;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    protected $tweet;

    protected function setUp() : void
    {
        parent::setUp();
        
        $this->signIn();

        $this->tweet = create(Tweet::class);
    }
    
    /** @test */
    public function a_user_can_like_tweet()
    {
        $this->tweet->like();

        $this->assertDatabaseHas('likes', [
                'user_id' => $this->user->id,
                'tweet_id' => $this->tweet->id,
                'liked' => true
            ]
        );

        $this->assertTrue($this->tweet->isLikedBy());
    }


    /** @test */
    public function a_user_can_dislike_tweet()
    {
        $this->tweet->dislike();

        $this->assertDatabaseHas('likes', [
                'user_id' => $this->user->id,
                'tweet_id' => $this->tweet->id,
                'liked' => false
            ]
        );

        $this->assertTrue($this->tweet->isDislikedBy());
    }
}
