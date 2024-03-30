<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @tets */
    public function only_logged_in_users_can_see_customers_list(): void
    {
        $response = $this->get('/customes')->assetRedirect('/login');

        
    }
}
