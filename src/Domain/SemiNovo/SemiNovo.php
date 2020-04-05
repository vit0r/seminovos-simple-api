<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

use JsonSerializable;

class Seminovo implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $info;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $price
     * @param string    $info
     * @param string    $link
     * @param string|null    $tipo
     */
    public function __construct(?int $id, string $title, string $price, string $info, string $link, ?string $tipo)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->info = $info;
        $this->link = $link;
        $this->tipo = $tipo;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->$id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getInfo(): string
    {
        return $this->info;
    }

    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'info' => $this->info,
            'link' => $this->link,
            'tipo' => $this->tipo
        ];
    }
}
