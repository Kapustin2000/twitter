<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowTest extends TestCase
{
    public $secondUser;
    
    protected function setUp() : void
    {
        parent::setUp();

        $this->signIn();
        
        $this->secondUser = create(User::class);
    }
    
    /** @test */
    public function user_can_follow_user()
    {
        $this->user->follow($this->secondUser);

        $this->assertDatabaseHas('follows', [
                'user_id' => $this->user->id,
                'following_user_id' => $this->secondUser->id
            ]
        );

        $this->assertTrue($this->user->following(
            $this->secondUser
        ));
    }


    /** @test */
    public function user_can_unfollow_user()
    { 
        $this->user->follow($this->secondUser);
 
        $this->user->unfollow($this->secondUser);

        
        $this->assertDatabaseMissing('follows', [
                'user_id' => $this->user->id,
                'following_user_id' => $this->secondUser->id
            ]
        );

        $this->assertFalse($this->user->following(
            $this->secondUser
        ));
    }
}
