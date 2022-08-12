<?php

namespace Tests\Feature;

use App\Models\MembershipType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Dusk\Chrome;

class AdminTest extends TestCase
{
    protected function SetUp():void
    {
        parent::setUp();
        $user = User::find(1);
        $this->actingAs($user)
            ->withSession(['banned' => false]);
    }
    public function test_create_member_view(){

        $page = $this->get("/create");
        $page->assertSee("phone");
    }
//
//    public function test_store_member_request(){
//        $this->post('/UserStore',[
//            "name"=>"test mohamed",
//            "phone"=>"123123",
//            "membership"=>1
//        ])->assertStatus(201);
//    }
}
