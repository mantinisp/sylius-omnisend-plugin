<?php

/*
 * @copyright C UAB NFQ Technologies
 *
 * This Software is the property of NFQ Technologies
 * and is protected by copyright law – it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * Contact UAB NFQ Technologies:
 * E-mail: info@nfq.lt
 * http://www.nfq.lt
 */

declare(strict_types=1);

namespace NFQ\SyliusOmnisendPlugin\Message\Handler;

use NFQ\SyliusOmnisendPlugin\Client\OmnisendClient;
use NFQ\SyliusOmnisendPlugin\Message\Command\DeleteCategory;
use NFQ\SyliusOmnisendPlugin\Model\TaxonInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DeleteCategoryHandler implements MessageHandlerInterface
{
    /** @var OmnisendClient */
    private $omnisendClient;

    /** @var TaxonRepositoryInterface */
    private $taxonRepository;

    public function __construct(
        OmnisendClient $omnisendClient,
        TaxonRepositoryInterface $taxonRepository
    ) {
        $this->omnisendClient = $omnisendClient;
        $this->taxonRepository = $taxonRepository;
    }

    public function __invoke(DeleteCategory $message): void
    {
        $this->omnisendClient->deleteCategory($message->getTaxonCode(), $message->getChannelCode());
        /** @var TaxonInterface|null $taxon */
        $taxon = $this->taxonRepository->findOneBy(['code' => $message->getTaxonCode()]);

        if (null !== $taxon) {
            $taxon->setPushedToOmnisend(null);
            $this->taxonRepository->add($taxon);
        }
    }
}
