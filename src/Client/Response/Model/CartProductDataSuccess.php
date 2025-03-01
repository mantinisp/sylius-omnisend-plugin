<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Client\Response\Model;

class CartProductDataSuccess
{
    /** @var string|null */
    private $cartProductID;
    
    /** @var string|null */
    private $productID;
    
    /** @var string|null */
    private $variantID;
    
    /** @var string|null */
    private $title;
    
    /** @var string|null */
    private $description;
    
    /** @var int */
    private $quantity = 0;
    
    /** @var int */
    private $price = 0;
    
    /** @var int */
    private $oldPrice = 0;
    
    /** @var int */
    private $discount = 0;
    
    /** @var string|null */
    private $productUrl;
    
    /** @var string|null */
    private $imageUrl;
    
    /** @var string|null */
    private $sku;

    public function getCartProductID(): ?string
    {
        return $this->cartProductID;
    }

    public function setCartProductID(?string $cartProductID): void
    {
        $this->cartProductID = $cartProductID;
    }

    public function getProductID(): ?string
    {
        return $this->productID;
    }

    public function setProductID(?string $productID): void
    {
        $this->productID = $productID;
    }

    public function getVariantID(): ?string
    {
        return $this->variantID;
    }

    public function setVariantID(?string $variantID): void
    {
        $this->variantID = $variantID;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getOldPrice(): int
    {
        return $this->oldPrice;
    }

    public function setOldPrice(int $oldPrice): void
    {
        $this->oldPrice = $oldPrice;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

    public function getProductUrl(): ?string
    {
        return $this->productUrl;
    }

    public function setProductUrl(?string $productUrl): void
    {
        $this->productUrl = $productUrl;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }
}
