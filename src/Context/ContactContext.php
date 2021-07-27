<?php

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Context;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ContactContext implements ContactContextInterface
{
    /** @var Request|null */
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getContactId(): ?string
    {
        $request = $this->requestStack->getMasterRequest();

        if (null === $request) {
            return null;
        }

        if (null !== $this->request && 'null' !== $request->headers->get(ContactContextInterface::HEADER_NAME)) {
            return $request->headers->get(ContactContextInterface::HEADER_NAME);
        }

        if (
            null !== $this->request &&
            null !== $this->request->cookies &&
            $this->request->cookies->has('omnisendContactID')
        ) {
            return $this->request->cookies->get('omnisendContactID');
        }

        return null;
    }
}