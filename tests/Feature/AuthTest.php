<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_login_page_exist()
    {
        $view = $this->get('/login');
        $view->assertSee('Sign in to start your session');
    }

    public function test_login_request(){
        $this->post('/loginRequest',[
            "phone"=>'01065469647',
            "password"=>"password"
        ])->assertRedirect('/admin');
    }

    public function test_logout_request()
    {
        $this->get('/logout')->assertRedirect("login");
    }
}
