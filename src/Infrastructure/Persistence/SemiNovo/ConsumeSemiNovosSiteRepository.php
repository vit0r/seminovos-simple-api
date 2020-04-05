<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\SemiNovo;

use App\Domain\SemiNovo\SemiNovo;
use App\Domain\SemiNovo\SemiNovoNotFoundException;
use App\Domain\SemiNovo\SemiNovoRepository;
use PHPHtmlParser\Dom;

class ConsumeSemiNovosSiteRepository implements SemiNovoRepository
{

    /**
     * @var SemiNovo[]
     */
    private $semiNovos;

    /**
     * @var string
     */
    private $semiNovosBaseUrlSite = 'https://seminovos.com.br' ;

    /**
     * ConsumeSemiNovosSiteRepository constructor.
     *
     * @param array $semiNovos
     */
    public function __construct()
    {
        $this->semiNovos = [];
    }

    /**
     * {@inheritdoc}
     * carro - https://seminovos.com.br/carro/estado-seminovo
     * moto - https://seminovos.com.br/moto/estado-seminovo
     * caminhao - https://seminovos.com.br/caminhao/estado-seminovo
     * filtro - https://seminovos.com.br/carro/?marca=audi&modelo=100&ano=2018-2021&preco=2000-1000000?pagina=2
     */
    public function findSemiNovosByTypePage(string $tipo_veiculo, array $filters): array
    {     
        $dom = new Dom;
        $pagina = $filters['pagina'];
        unset($filters['pagina']); 
        $options_filters = implode('/', $filters);
        $semiNovosUrl = $this->semiNovosBaseUrlSite.'/'.$tipo_veiculo.'/'.$options_filters.'/estado-seminovo?page='.$pagina;
        $dom->loadFromUrl($semiNovosUrl);
        $contents = $dom->find('.card-content');
        foreach($contents  as $key => $item){
            $title = $item->find('.card-title')->innerHtml;
            $price = $item->find('.card-price')->innerHtml;
            $info = $item->find('.list-inline')->innerHtml;
            $link = $this->semiNovosBaseUrlSite . $item->find('a')->getTag()->getAttribute('href')["value"];
            array_push($this->semiNovos, new SemiNovo($key++, $title, $price,$info,$link, ""));
        }
        return array_values($this->semiNovos);
    }

    /**
     * {@inheritdoc}
     */
    public function findSemiNovoOfId(int $id): SemiNovo
    {
        /*
        https://seminovos.com.br/chevrolet-tracker-2006-2007--912317
        */

        if (!isset($this->semiNovos[$id])) {
            throw new SemiNovoNotFoundException();
        }

        return $this->semiNovos[$id];
    }
}
