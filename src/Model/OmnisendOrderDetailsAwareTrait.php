<?php

/*
 * This file is part of the NFQ package.
 *
 * (c) Nfq Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Model;

use Doctrine\ORM\Mapping as ORM;

trait OmnisendOrderDetailsAwareTrait
{
    /**
     * @var OrderDetails
     * @ORM\OneToOne(targetEntity="NFQ\SyliusOmnisendPlugin\Model\OrderDetails", mappedBy="order", cascade={"all"})
     *
     * @ORM\JoinColumn(name="omnisend_order_details_id", onDelete="CASCADE")
     */
    protected $omnisendOrderDetails = null;

    public function __construct()
    {
        $this->omnisendOrderDetails = new OrderDetails();
        $this->omnisendOrderDetails->setOrder($this);
    }

    public function getOmnisendOrderDetails(): ?OrderDetails
    {
        return $this->omnisendOrderDetails;
    }

    public function setOmnisendOrderDetails(?OrderDetails $omnisendOrderDetails): void
    {
        $this->omnisendOrderDetails = $omnisendOrderDetails;
    }
}
