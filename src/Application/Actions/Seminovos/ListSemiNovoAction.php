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
        $tipo_veiculo = (string) $this->resolveArg('tipo_veiculo');
        $filters = (array) $this->request->getQueryParams();
        if (!array_key_exists('pagina', $filters)) {
            array_push($filters, ['pagina' => '1']);
        }
        // Adiciona prefixo preco-
        if (array_key_exists('preco', $filters)) {
            $filters['preco'] = 'preco-'.$filters['preco'];
        }
        // Adiciona prefixo ano-
        if (array_key_exists('ano', $filters)) {
            $filters['ano'] = 'ano-'.$filters['ano'];
        }
        $semiNovos = $this->semiNovoRepository->findSemiNovosByTypePage(
            $tipo_veiculo,
            $filters
        );
        $this->logger->info('semiNovos list was viewed.');
        return $this->respondWithData($semiNovos);
    }
}
