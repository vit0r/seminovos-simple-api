<?php
declare(strict_types=1);

namespace App\Application\Actions\Seminovos;

use App\Application\Actions\Action;
use App\Domain\SemiNovo\SemiNovoRepository;
use Psr\Log\LoggerInterface;

abstract class SemiNovoAction extends Action
{
    /**
     * @var SemiNovoRepository
     */
    protected $semiNovoRepository;

    /**
     * @param LoggerInterface $logger
     * @param SemiNovoRepository  $semiNovoRepository
     */
    public function __construct(LoggerInterface $logger, SemiNovoRepository $semiNovoRepository)
    {
        parent::__construct($logger);
        $this->semiNovoRepository = $semiNovoRepository;
    }
}
