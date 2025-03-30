<?php

namespace Trophy\Traits;

use Trophy\Core\Json\JsonProperty;

/**
 * An object with editable user fields.
 */
trait UpsertedUser
{
    use UpdatedUser;

    /**
     * @var string $id The ID of the user in your database. Must be a string.
     */
    #[JsonProperty('id')]
    public string $id;
}
