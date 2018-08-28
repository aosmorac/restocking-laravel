<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageItemsTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    function unauthorized_users_cannot_update_items()
    {
        $this->withExceptionHandling();

        $list = create('App\Rlist');
        $item = create('App\Item', ['list_id' => $list->id]);

        $this->patch("/items/{$item->id}")
            ->assertRedirect('login');

        $this->signIn()
            ->patch("/items/{$item->id}")
            ->assertStatus(302);
    }

    /** @test */
    function authorized_users_can_update_items()
    {
        $this->signIn();

        $list = create('App\Rlist');
        $item = create('App\Item', ['list_id' => $list->id]);
        $amount = 783;
        $status = 'have enough';
        $this->patch("/items/{$item->id}", ['amount' => $amount, 'status'=>$status]);
        $this->assertDatabaseHas('items', ['id' => $item->id, 'amount' => $amount, 'status'=>$status]);
    }
}
