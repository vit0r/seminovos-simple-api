<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

use JsonSerializable;

class SeminovoAnuncio implements JsonSerializable
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $ano;

    /**
     * @var string
     */
    private $quilometragem;

    /**
     * @var string
     */
    private $cambio;

    /**
     * @var string
     */
    private $portas;

    /**
     * @var string
     */
    private $combustivel;

    /**
     * @var string
     */
    private $cor;

    /**
     * @var string
     */
    private $placa;

    /**
     * @var string
     */
    private $aceitaTroca;

    /**
     * @param array  $semiNovoAnuncioDetalhe
     */
    public function __construct(array $semiNovoAnuncioDetalhe)
    {
        $this->title = $semiNovoAnuncioDetalhe['title'];
        $this->description = $semiNovoAnuncioDetalhe['description'];
        $this->price = $semiNovoAnuncioDetalhe['price'];
        $this->ano = $semiNovoAnuncioDetalhe['ano'];
        $this->quilometragem = $semiNovoAnuncioDetalhe['quilometragem'];
        $this->cambio = $semiNovoAnuncioDetalhe['cambio'];
        $this->portas = $semiNovoAnuncioDetalhe['portas'];
        $this->combustivel = $semiNovoAnuncioDetalhe['combustivel'];
        $this->cor = $semiNovoAnuncioDetalhe['cor'];
        $this->placa = $semiNovoAnuncioDetalhe['placa'];
        $this->aceitaTroca = $semiNovoAnuncioDetalhe['aceitaTroca'];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }
  
    /**
     * @return string
     */
    public function getAno(): string
    {
        return $this->ano;
    }
    
    /**
     * @return string
     */
    public function getQuilometragem(): string
    {
        return $this->quilometragem;
    }
    
    /**
     * @return string
     */
    public function getCambio(): string
    {
        return $this->cambio;
    }

    /**
     * @return string
     */
    public function getPortas(): string
    {
        return $this->portas;
    }

    /**
     * @return string
     */
    public function getCombustivel(): string
    {
        return $this->combustivel;
    }
    
    /**
     * @return string
     */
    public function getCor(): string
    {
        return $this->cor;
    }

    /**
     * @return string
     */
    public function getPlaca(): string
    {
        return $this->placa;
    }
    
    /**
    * @return string
    */
   public function getAceitaTroca(): string
   {
       return $this->aceitaTroca;
   }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'ano' => $this->ano,
            'quilometragem' => $this->quilometragem,
            'cambio' => $this->cambio,
            'portas' => $this->portas,
            'combustivel' => $this->combustivel,
            'cor' => $this->cor,
            'placa' => $this->placa,
            'aceitaTroca' => $this->aceitaTroca,
        ];
    }
}
