<?php

declare(strict_types=1);

namespace Symplicity\Outlook\Entities;

use Symplicity\Outlook\Interfaces\Entity\DateEntityInterface;

class DateEntity implements DateEntityInterface
{
    protected $start;
    protected $end;
    protected $timezone;
    protected $modified;

    public function __construct(array $data)
    {
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->timezone = $data['timezone'] ?? null;
        $this->modified = $data['modified'] ?? null;
    }

    public function getStartDate() : string
    {
        return $this->start;
    }

    public function getEndDate() : string
    {
        return $this->end;
    }

    public function getModifiedDate() : ?string
    {
        return $this->modified;
    }

    public function getTimezone() : ?string
    {
        return $this->timezone;
    }
}
