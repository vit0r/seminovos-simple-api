<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\SemiNovo;

use App\Domain\SemiNovo\SemiNovo;
use App\Domain\SemiNovo\SemiNovoNotFoundException;
use App\Domain\SemiNovo\SemiNovoRepository;

class ConsumeSemiNovosSiteRepository implements SemiNovoRepository
{
    /**
     * @var SemiNovo[]
     */
    private $semiNovos;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $semiNovos
     */
    public function __construct(array $semiNovos = null)
    {
        $this->semiNovos = $semiNovos ?? [
            1 => new SemiNovo(1, 'bill.gates', 'Bill', 'Gates'),
            2 => new SemiNovo(2, 'steve.jobs', 'Steve', 'Jobs'),
            3 => new SemiNovo(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
            4 => new SemiNovo(4, 'evan.spiegel', 'Evan', 'Spiegel'),
            5 => new SemiNovo(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->semiNovos);
    }

    /**
     * {@inheritdoc}
     */
    public function findSemiNovoOfId(int $id): SemiNovo
    {
        if (!isset($this->semiNovos[$id])) {
            throw new SemiNovoNotFoundException();
        }

        return $this->semiNovos[$id];
    }
}
