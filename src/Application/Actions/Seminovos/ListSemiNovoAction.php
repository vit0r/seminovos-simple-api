<?php
declare(strict_types=1);

namespace App\Application\Actions\Seminovos;

use Psr\Http\Message\ResponseInterface as Response;

class ListSemiNovoAction extends SemiNovoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $semiNovos = $this->semiNovoRepository->findAll();

        $this->logger->info("semiNovos list was viewed.");

        return $this->respondWithData($semiNovos);
    }
}
