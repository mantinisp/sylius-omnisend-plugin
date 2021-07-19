<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Client\Response\Model;

class ItemContactResponseSuccess
{
    /** @var string|null */
    private $contactID;
    
    /** @var string|null */
    private $email;

    public function getContactID(): ?string
    {
        return $this->contactID;
    }

    public function setContactID(?string $contactID): void
    {
        $this->contactID = $contactID;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
