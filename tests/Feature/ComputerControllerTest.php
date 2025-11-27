<?php

use App\Models\Computer;
use App\Models\Network;
use App\Models\User;
use Silber\Bouncer\BouncerFacade as Bouncer;

beforeEach(function () {
    Bouncer::allow('technician')->to('manage-computers');
});

test('technician can view computers list', function () {
    $user = User::factory()->create();
    $user->assign('technician');

    $response = $this->actingAs($user)->get(route('computers.index'));

    $response->assertStatus(200);
    $response->assertViewIs('computers.index');
});



test('technician can create computer', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->post(route('computers.store'), [
        'serial_number' => 'SN123456',
        'model' => 'Dell XPS',
        'brand' => 'Dell',
        'commissioned_at' => '2023-01-01',
        'network_id' => $network->id,
    ]);

    $response->assertRedirect(route('computers.index'));
    $this->assertDatabaseHas('computers', ['serial_number' => 'SN123456']);
});

test('technician can update computer', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $computer = Computer::create([
        'serial_number' => 'SNOLD',
        'model' => 'Old Model',
        'brand' => 'Old Brand',
        'commissioned_at' => '2020-01-01',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->put(route('computers.update', $computer), [
        'serial_number' => 'SNNEW',
        'model' => 'New Model',
        'brand' => 'New Brand',
        'commissioned_at' => '2023-01-01',
        'network_id' => $network->id,
    ]);

    $response->assertRedirect(route('computers.index'));
    $this->assertDatabaseHas('computers', ['serial_number' => 'SNNEW']);
});

test('technician can delete computer', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $computer = Computer::create([
        'serial_number' => 'SNDEL',
        'model' => 'Del Model',
        'brand' => 'Del Brand',
        'commissioned_at' => '2020-01-01',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->delete(route('computers.destroy', $computer));

    $response->assertRedirect(route('computers.index'));
    $this->assertDatabaseMissing('computers', ['id' => $computer->id]);
});



test('technician can view edit page', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $computer = Computer::create([
        'serial_number' => 'SNEDIT',
        'model' => 'Edit Model',
        'brand' => 'Edit Brand',
        'commissioned_at' => '2020-01-01',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->get(route('computers.edit', $computer));

    $response->assertStatus(200);
});

