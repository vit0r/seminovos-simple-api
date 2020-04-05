<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

interface SemiNovoRepository
{
    /**
     * @param string $tipo_veiculo
     * @param array $filters
     * @return SemiNovo[]
     */
    public function findSemiNovosByTypePage(string $tipo_veiculo, array $filters): array;

    /**
     * @param int $id
     * @return SemiNovo
     * @throws SemiNovoNotFoundException
     */
    public function findSemiNovoOfId(int $id): SemiNovo;
}
