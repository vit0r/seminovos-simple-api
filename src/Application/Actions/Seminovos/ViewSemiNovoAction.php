<?php
declare(strict_types=1);

namespace App\Application\Actions\Seminovos;

use Psr\Http\Message\ResponseInterface as Response;

class ViewSemiNovoAction extends SemiNovoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $anuncioId = (string) $this->resolveArg('id');
        $semiNovo = $this->semiNovoRepository->findSemiNovoAnuncio($anuncioId);

        $this->logger->info("Anuncio id `${anuncioId}` was viewed.");

        return $this->respondWithData($semiNovo);
    }
}
