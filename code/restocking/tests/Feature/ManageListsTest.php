<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageListsTest extends TestCase
{
    use DatabaseMigrations;

    protected $list;

    public function setUp()
    {
        parent::setUp();

        $this->list = create('App\Rlist');
    }


    /** @test */
    public function an_authenticated_user_can_create_new_list()
    {
        $this->signIn();

        $list = make('App\Rlist');

        $response = $this->post('/lists', $list->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($list->title)
            ->assertSee($list->body);
    }

    /** @test */
    public function a_user_can_view_all_lists()
    {
        $this->get('/lists')
            ->assertSee($this->list->title);
    }

    /** @test */
    function a_user_can_read_items_that_are_associated_with_a_list()
    {
        $item = create('App\Item', ['list_id' => $this->list->id]);

        $this->get($this->list->path())
            ->assertSee($item->name);
    }

    /** @test */
    function an_authenticated_user_may_add_items_in_a_list()
    {
        $this->signIn();

        $list = create('App\Rlist');
        $item = make('App\Item');

        $this->post($list->path() . '/items', $item->toArray());

        $this->get($list->path())
            ->assertSee($item->name);
    }
}
