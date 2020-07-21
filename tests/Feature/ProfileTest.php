<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();

        $this->signIn(); 
    }

    /** @test */
    public function user_can_visit_profile()
    {
        $secondUser = create(User::class);
        
        $response = $this->get($secondUser->path());

        $response->assertStatus(200);

    }

    /** @test */
    public function user_can_visit_own_profile()
    {
        $response = $this->get($this->user->path());

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_visit_edit_own_profile_page()
    {
        $response = $this->get($this->user->path('edit'));

        $response->assertStatus(200);
    }


    /** @test */
    public function user_can_not_visit_edit_other_user_profile_page()
    {
        $secondUser = create(User::class);
        $response = $this->get($secondUser->path('edit'));

        $response->assertStatus(403);
    }

    /** @test */
    public function user_see_edit_profile_button_when_visit_own_profile()
    {
        $this->get($this->user->path())
            ->assertStatus(200)
            ->assertSeeText('Edit Profile');
    }

    /** @test */
    public function user_see_follow_button()
    {
        $secondUser = create(User::class);


        $this->get($secondUser->path())
            ->assertStatus(200)
            ->assertSeeText('Follow Me');
    }

    /** @test */
    public function user_see_unfollow_button()
    {
        $secondUser = create(User::class);

        $this->user->follow($secondUser);

        $this->get($secondUser->path())
            ->assertStatus(200)
            ->assertSeeText('Unfollow Me');
    }
}
