<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;


    protected function signIn($user = null)
    {
        $this->user = $user ?: create('App\Models\User');
        $this->actingAs($this->user );
        return $this;
    }
}
