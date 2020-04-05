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
    private $anuncio;

    /**
     * @param int|null      $id
     * @param string        $title
     * @param string        $price
     * @param string        $info
     * @param string        $link
     * @param string|null   $anuncio
     */
    public function __construct(?int $id, string $title, string $price, string $info, string $link, ?string $anuncio)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->info = $info;
        $this->link = $link;
        $this->anuncio = $anuncio;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
    public function getInfo(): string
    {
        return $this->info;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getAnuncio(): ?string
    {
        return $this->anuncio;
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
            'anuncio' => $this->anuncio
        ];
    }
}
