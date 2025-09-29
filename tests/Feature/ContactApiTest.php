<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Group;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_contact(): void
    {
        $group = Group::factory()->create();
        $payload = [
            'first_name' => 'Victor',
            'last_name'  => 'Muriuki',
            'email'      => 'victor@example.com',
            'group_ids'  => [$group->id],
        ];

        $this->postJson('/api/contacts', $payload)
             ->assertStatus(201)
             ->assertJsonFragment(['first_name' => 'Victor']);
    }

    public function test_update_contact(): void
    {
        $contact = Contact::factory()->create();
        $group = Group::factory()->create();

        $payload = [
            'first_name' => 'UpdatedVictor',
            'group_ids'  => [$group->id],
        ];

        $this->putJson("/api/contacts/{$contact->id}", $payload)
             ->assertStatus(200)
             ->assertJsonFragment(['first_name' => 'UpdatedVictor']);
    }

    public function test_delete_contact(): void
    {
        $contact = Contact::factory()->create();

        $this->deleteJson("/api/contacts/{$contact->id}")
             ->assertStatus(204);
    }

    public function test_list_contacts(): void
    {
        Contact::factory(5)->create();

        $this->getJson('/api/contacts')
             ->assertStatus(200)
             ->assertJsonCount(5, 'data');
    }
}
