<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Context;

interface ContactContextInterface
{
    public const HEADER_NAME = 'omnisend-contact-id';

    public const COOKIE_NAME = 'omnisendContactID';

    public function getContactId(): ?string;
}