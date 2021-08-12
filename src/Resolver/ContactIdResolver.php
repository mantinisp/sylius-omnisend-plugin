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

namespace NFQ\SyliusOmnisendPlugin\Resolver;

use NFQ\SyliusOmnisendPlugin\Context\ContactContextInterface;
use NFQ\SyliusOmnisendPlugin\Model\ContactAwareInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ContactIdResolver implements ContactIdResolverInterface
{
    /** @var ContactContextInterface|null */
    private $contactContext;

    /** @var Request|null */
    private $request;

    public function __construct(ContactContextInterface $contactContext, RequestStack $requestStack)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->contactContext = $contactContext;
    }

    public function resolve(OrderInterface $order): ?string
    {
        /** @var ContactAwareInterface|null $customer */
        $customer = $order->getCustomer();

        if (null !== $customer && null !== $customer->getOmnisendContactId()) {
            return $customer->getOmnisendContactId();
        }

        $contactId = $this->contactContext->getContactId();

        return $contactId !== '' && $contactId !== null ? $contactId : null;
    }
}
