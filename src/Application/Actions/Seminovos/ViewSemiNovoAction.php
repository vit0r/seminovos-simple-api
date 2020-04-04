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
        $userId = (int) $this->resolveArg('id');
        $user = $this->semiNovoRepository->findSemiNovoOfId($userId);

        $this->logger->info("User of id `${userId}` was viewed.");

        return $this->respondWithData($user);
    }
}
