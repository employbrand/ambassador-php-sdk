<?php

namespace EmploybrandAmbassador\Entity;


class Candidate extends AbstractEntity
{

    public ?int $id = null;

    public ?string $fullName = null;

    public ?string $firstName = null;

    public ?string $lastName = null;

    public array $data = [];

    public ?string $status = null;

    public ?string $startedAt = null;

    public ?string $interviewedAt = null;

    public ?object $ambassador = null;

    public ?string $hiredAt = null;

    public ?string $updatedAt = null;

    public ?string $createdAt = null;

}
