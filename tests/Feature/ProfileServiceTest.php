<?php

namespace Tests\Feature;

use App\Http\Requests\ProfileRequest;
use App\Services\Interfaces\ImageUploadInterface;
use App\Services\ProfileService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker; 
use Tests\TestCase;

class ProfileServiceTest extends TestCase
{
    public $request;

    protected function setUp() : void
    {
        parent::setUp();

        $this->signIn();

        $this->request = new ProfileRequest(['name' => 'New name']); 
    }


    /** @test */

    public function test_profile_service_is_working()
    { 
        $stub = $this->createMock(ImageUploadInterface::class);

        $stub->method('handleImageUpload')
            ->willReturn('path');

        $profileService = new ProfileService($stub);

        $result = $profileService->update($this->user, $this->request);

        $this->assertTrue($result);
        
        $this->assertEquals('New name', $this->user->name);

        $this->assertEquals('path', $this->user->avatar);

        $this->assertEquals('path',  $this->user->banner);

    }
}
