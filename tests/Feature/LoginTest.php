<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_login_page_loaded()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire('pages.login');
        $response->assertDontSeeLivewire('pages.lijst');
        $response->assertDontSee('<nav>');
    }

    public function test_login_redirects_to_lijst()
    {
        $response = $this->followingRedirects()->actingAs(User::find(7))->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire('pages.lijst');
        $response->assertSee('nav');
        $response->assertDontSeeLivewire('pages.login');
        $response->assertSee("Lijst van " . User::find(7)->name);
    }

    public function test_redirect_to_login()
    {
        $response = $this->followingRedirects()->get('/lijst/1');

        $response->assertStatus(200);
        $response->assertSeeLivewire('pages.login');
    }
}
