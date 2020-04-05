<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\SemiNovo;

use App\Domain\SemiNovo\SemiNovo;
use App\Domain\SemiNovo\SemiNovoAnuncio;
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
        foreach($contents as $key => $item){
            $title = $item->find('.card-title')->innerHtml;
            $price = $item->find('.card-price')->innerHtml;
            $info = $item->find('.list-inline')->innerHtml;
            $link = $this->semiNovosBaseUrlSite . $item->find('a')->getTag()->getAttribute('href')["value"];
            $auncio = str_replace($this->semiNovosBaseUrlSite,"http://localhost:8080/seminovos/anuncio", explode("?", $link)[0]);
            array_push($this->semiNovos, new SemiNovo($key++, $title, $price,$info,$link, $auncio));
        }
        return array_values($this->semiNovos);
    }

    /**
     * {@inheritdoc}
     */
    public function findSemiNovoAnuncio(string $anuncioId): SeminovoAnuncio
    {
        $dom = new Dom;
        $semiNovosUrl = $this->semiNovosBaseUrlSite.'/'.$anuncioId;
        $dom->loadFromUrl($semiNovosUrl);
        $contents = $dom->find('.item-info');
        foreach($contents as $item){
            $anuncioDetalhe = [
                'title' => $item->find('h1')->innerHtml,
                'description' => $item->find('.desc')->innerHtml,
                'price' => preg_replace('/[<span>|<\/span>]/i', '', $item->find('.price')->innerHtml),
                'ano' => $item->find('span[title=Ano/modelo]')->innerHtml,
                'quilometragem' => $item->find('span[title=Kilometragem do veículo]')->innerHtml,
                'cambio' => $item->find('span[title=Tipo de transmissão]')->innerHtml,
                'portas' => $item->find('span[title=Portas]')->innerHtml,
                'combustivel' => $item->find('span[title=Tipo de combustível]')->innerHtml,
                'cor' => $item->find('span[title=Cor do veículo]')->innerHtml,
                'placa' => $item->find('span[title=Final da placa]')->innerHtml,
                'aceitaTroca' => $item->find('span[title=Aceita troca?]')->innerHtml
            ];
        }
        return new SeminovoAnuncio($anuncioDetalhe);
    }
}
