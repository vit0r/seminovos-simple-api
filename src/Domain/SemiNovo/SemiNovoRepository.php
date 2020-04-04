<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

interface SemiNovoRepository
{
    /**
     * @return SemiNovo[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return SemiNovo
     * @throws SemiNovoNotFoundException
     */
    public function findSemiNovoOfId(int $id): SemiNovo;
}
