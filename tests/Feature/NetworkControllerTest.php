<?php

use App\Models\Network;
use App\Models\User;
use Silber\Bouncer\BouncerFacade as Bouncer;

beforeEach(function () {
    Bouncer::allow('admin')->to('manage-networks');
});

test('admin can view networks list', function () {
    $user = User::factory()->create();
    $user->assign('admin');

    $response = $this->actingAs($user)->get(route('networks.index'));

    $response->assertStatus(200);
    $response->assertViewIs('networks.index');
});



test('admin can create network', function () {
    $user = User::factory()->create();
    $user->assign('admin');

    $response = $this->actingAs($user)->post(route('networks.store'), [
        'label' => 'Test Network',
        'lan' => '192.168.1.0/24',
        'is_out_of_service' => false,
    ]);

    $response->assertRedirect(route('networks.index'));
    $this->assertDatabaseHas('networks', ['label' => 'Test Network']);
});

test('admin can update network', function () {
    $user = User::factory()->create();
    $user->assign('admin');
    $network = Network::create(['label' => 'Old Name', 'lan' => '10.0.0.0/8', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->put(route('networks.update', $network), [
        'label' => 'New Name',
        'lan' => '10.0.0.0/8',
        'is_out_of_service' => true,
    ]);

    $response->assertRedirect(route('networks.index'));
    $this->assertDatabaseHas('networks', ['label' => 'New Name', 'is_out_of_service' => true]);
});

test('admin can delete network', function () {
    $user = User::factory()->create();
    $user->assign('admin');
    $network = Network::create(['label' => 'To Delete', 'lan' => '10.0.0.0/8', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->delete(route('networks.destroy', $network));

    $response->assertRedirect(route('networks.index'));
    $this->assertDatabaseMissing('networks', ['id' => $network->id]);
});



test('admin can view edit page', function () {
    $user = User::factory()->create();
    $user->assign('admin');
    $network = Network::create(['label' => 'Edit Me', 'lan' => '10.0.0.0/8', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->get(route('networks.edit', $network));

    $response->assertStatus(200);
});

test('admin can view show page', function () {
    $user = User::factory()->create();
    $user->assign('admin');
    $network = Network::create(['label' => 'Show Me', 'lan' => '10.0.0.0/8', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->get(route('networks.show', $network));

    $response->assertStatus(200);
});
