<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Client\Response\Model;

class BatchItemSuccess
{
    /** @var string|null */
    private $itemID;

    /** @var ItemContactResponseSuccess|null */
    private $response;

    public function getItemID(): ?string
    {
        return $this->itemID;
    }

    public function setItemID(?string $itemID): void
    {
        $this->itemID = $itemID;
    }

    public function getResponse(): ?ItemContactResponseSuccess
    {
        return $this->response;
    }

    public function setResponse(?ItemContactResponseSuccess $response): void
    {
        $this->response = $response;
    }
}
