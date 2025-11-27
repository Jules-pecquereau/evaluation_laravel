<?php

use App\Models\Network;
use App\Models\Server;
use App\Models\User;
use Silber\Bouncer\BouncerFacade as Bouncer;

beforeEach(function () {
    Bouncer::allow('technician')->to('manage-servers');
});

test('technician can view servers list', function () {
    $user = User::factory()->create();
    $user->assign('technician');

    $response = $this->actingAs($user)->get(route('servers.index'));

    $response->assertStatus(200);
    $response->assertViewIs('servers.index');
});

test('user without permission cannot view servers list', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('servers.index'));

    $response->assertStatus(403);
});

test('technician can create server', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);

    $response = $this->actingAs($user)->post(route('servers.store'), [
        'ip_address' => '192.168.1.10',
        'type' => 'Web Server',
        'os' => 'Ubuntu',
        'network_id' => $network->id,
    ]);

    $response->assertRedirect(route('servers.index'));
    $this->assertDatabaseHas('servers', ['ip_address' => '192.168.1.10']);
});

test('technician can update server', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $server = Server::create([
        'ip_address' => '192.168.1.20',
        'type' => 'DB Server',
        'os' => 'CentOS',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->put(route('servers.update', $server), [
        'ip_address' => '192.168.1.25',
        'type' => 'Database Server',
        'os' => 'CentOS 8',
        'network_id' => $network->id,
    ]);

    $response->assertRedirect(route('servers.index'));
    $this->assertDatabaseHas('servers', ['ip_address' => '192.168.1.25']);
});

test('technician can delete server', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $server = Server::create([
        'ip_address' => '192.168.1.30',
        'type' => 'Cache Server',
        'os' => 'Redis',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->delete(route('servers.destroy', $server));

    $response->assertRedirect(route('servers.index'));
    $this->assertDatabaseMissing('servers', ['id' => $server->id]);
});

test('technician can view create page', function () {
    $user = User::factory()->create();
    $user->assign('technician');

    $response = $this->actingAs($user)->get(route('servers.create'));

    $response->assertStatus(200);
});

test('technician can view edit page', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $server = Server::create([
        'ip_address' => '192.168.1.40',
        'type' => 'Mail Server',
        'os' => 'Postfix',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->get(route('servers.edit', $server));

    $response->assertStatus(200);
});

test('technician can view show page', function () {
    $user = User::factory()->create();
    $user->assign('technician');
    $network = Network::create(['label' => 'Net1', 'lan' => '192.168.1.0/24', 'is_out_of_service' => false]);
    $server = Server::create([
        'ip_address' => '192.168.1.50',
        'type' => 'File Server',
        'os' => 'Windows Server',
        'network_id' => $network->id,
    ]);

    $response = $this->actingAs($user)->get(route('servers.show', $server));

    $response->assertStatus(200);
});
