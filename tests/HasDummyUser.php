<?php

namespace Tests;
use App\Models\User;
use Illuminate\Support\Collection;

trait HasDummyUser 
{
    /**
     * Create dummy user.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function createDummyUser(array $data = []): User {
        return User::factory()->create($data);
    }

    /**
     * Create dummy user.
     *
     * @param int $many
     * @return \App\Models\User
     */
    public function createDummyUsers(int $many): Collection {
        return User::factory($many)->create();
    }

    /**
     * Create a dummy user and make it current user.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function actingAsDummyUser(array $data = []): User {
        $user = $this->createDummyUser($data);

        $this->actingAs($user);

        return $user;
    }
}