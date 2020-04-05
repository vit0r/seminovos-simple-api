<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

use App\Application\Actions\Seminovos\SemiNovoAction;

interface SemiNovoRepository
{
    /**
     * @param string $tipo_veiculo
     * @param array $filters
     * @return SemiNovo[]
     */
    public function findSemiNovosByTypePage(string $tipo_veiculo, array $filters): array;

    /**
     * @param string $anuncioId
     * @return SemiNovoAction
     * @throws SemiNovoNotFoundException
     */
    public function findSemiNovoAnuncio(string $anuncioId): SeminovoAnuncio;
}
