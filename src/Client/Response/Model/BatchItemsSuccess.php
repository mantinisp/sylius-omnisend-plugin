<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Client\Response\Model;

class BatchItemsSuccess
{
    /** @var string */
    private $batchID;

    /** @var BatchItemSuccess[] */
    private $responses = [];

    public function __construct()
    {
        $this->responses = [];
    }

    public function getBatchID(): string
    {
        return $this->batchID;
    }

    public function setBatchID(string $batchID): void
    {
        $this->batchID = $batchID;
    }

    public function getResponses(): array
    {
        return $this->responses;
    }

    public function addResponse(BatchItemSuccess $batchItemSuccess): void
    {
        $this->responses[] = $batchItemSuccess;
    }

    public function setResponses(array $responses): void
    {
        $this->responses = $responses;
    }
}
