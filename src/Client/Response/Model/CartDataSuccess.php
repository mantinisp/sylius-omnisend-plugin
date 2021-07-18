<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Client\Response\Model;

class CartDataSuccess
{
    /** @var string|null */
    private $contactId;

    /** @var string|null */
    private $cartID;

    /** @var string|null */
    private $email;

    /** @var string|null */
    private $phone;

    /** @var string|null */
    private $currency;

    /** @var string|null */
    private $cartRecoveryUrl;

    /** @var \DateTime|null */
    private $createdAt;

    /** @var \DateTime|null */
    private $updatedAt;

    /** @var int */
    private $cartSum = 0;

    /** @var CartProductDataSuccess[] */
    private $products = [];

    public function __construct()
    {
        $this->products = [];
    }

    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    public function setContactId(?string $contactId): void
    {
        $this->contactId = $contactId;
    }

    public function getCartID(): ?string
    {
        return $this->cartID;
    }

    public function setCartID(?string $cartID): void
    {
        $this->cartID = $cartID;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    public function getCartRecoveryUrl(): ?string
    {
        return $this->cartRecoveryUrl;
    }

    public function setCartRecoveryUrl(?string $cartRecoveryUrl): void
    {
        $this->cartRecoveryUrl = $cartRecoveryUrl;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getCartSum(): int
    {
        return $this->cartSum;
    }

    public function setCartSum(int $cartSum): void
    {
        $this->cartSum = $cartSum;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProduct(CartProductDataSuccess $product): void
    {
        $this->products[] = $product;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
}

