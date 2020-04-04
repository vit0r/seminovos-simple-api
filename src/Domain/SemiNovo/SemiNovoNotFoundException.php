<?php
declare(strict_types=1);

namespace App\Domain\SemiNovo;

use App\Domain\DomainException\DomainRecordNotFoundException;

class SemiNovoNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The SemiNovo you requested does not exist.';
}
