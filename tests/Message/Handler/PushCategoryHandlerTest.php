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

namespace Tests\NFQ\SyliusOmnisendPlugin\Message\Handler;

use Doctrine\ORM\EntityManagerInterface;
use NFQ\SyliusOmnisendPlugin\Client\OmnisendClient;
use NFQ\SyliusOmnisendPlugin\Client\Response\Model\BatchSuccess;
use NFQ\SyliusOmnisendPlugin\Factory\Request\BatchFactoryInterface;
use NFQ\SyliusOmnisendPlugin\Factory\Request\CategoryFactoryInterface;
use NFQ\SyliusOmnisendPlugin\Message\Command\CreateBatch;
use NFQ\SyliusOmnisendPlugin\Message\Handler\Batch\CategoryBatchHandleStrategy;
use PHPUnit\Framework\TestCase;
use NFQ\SyliusOmnisendPlugin\Doctrine\ORM\TaxonRepositoryInterface;
use Tests\NFQ\SyliusOmnisendPlugin\Application\Entity\Taxon;

class PushCategoryHandlerTest extends TestCase
{
    /** @var OmnisendClient */
    private $omnisendClient;

    /** @var CategoryFactoryInterface */
    private $categoryFactory;

    /** @var BatchFactoryInterface */
    private $batchFactory;

    /** @var TaxonRepositoryInterface */
    private $repository;

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var CategoryBatchHandleStrategy */
    private $handler;

    protected function setUp(): void
    {
        $this->categoryFactory = $this->createMock(CategoryFactoryInterface::class);
        $this->omnisendClient = $this->createMock(OmnisendClient::class);
        $this->repository = $this->createMock(TaxonRepositoryInterface::class);
        $this->batchFactory = $this->createMock(BatchFactoryInterface::class);
        $this->entityManager = $this->createMock(EntityManagerInterface::class);

        $this->handler = new CategoryBatchHandleStrategy(
            $this->omnisendClient,
            $this->repository,
            $this->categoryFactory,
            $this->batchFactory,
            $this->entityManager,
        );
    }

    /** @dataProvider data */
    public function testIfSplitsWell(int $count, int $batchSizes)
    {
        $message = new CreateBatch('category', 'en', 'en');

        $this->repository
            ->expects($this->exactly(1))
            ->method('getNotSyncedToOmnisendCount')
            ->willReturn($count);
        $this->repository
            ->expects($this->exactly($batchSizes))
            ->method('findNotSyncedToOmnisend')
            ->willReturn([]);

        $this->handler->handle($message);
    }

    public function data()
    {
        return [
            'zero' => [
                0,
                0
            ],
            'one' => [
                1,
                1
            ],
            '999' => [
                999,
                1
            ],
            '1000' => [
                1000,
                1
            ],
            '1001' => [
                1001,
                2
            ],
            '1999' => [
                1999,
                2
            ],
            '2000' => [
                2000,
                2
            ],
            '2001' => [
                2001,
                3
            ]
        ];
    }

    public function testIfSendUpdateRequestIfOmnisendFlagIsAlreadySet()
    {
        $taxon = new Taxon();
        $message = new CreateBatch('category', 'en', 'en');

        $this->repository
            ->expects($this->exactly(1))
            ->method('getNotSyncedToOmnisendCount')
            ->willReturn(1);
        $this->repository
            ->expects($this->exactly(1))
            ->method('findNotSyncedToOmnisend')
            ->willReturn([$taxon]);
        $this->repository
            ->expects($this->exactly(0))
            ->method('add');
        $this->omnisendClient
            ->expects($this->exactly(1))
            ->method('postBatch')
            ->willReturn(new BatchSuccess());

        $this->handler->handle($message);

        $this->assertTrue($taxon->isPushedToOmnisend());
    }
}
