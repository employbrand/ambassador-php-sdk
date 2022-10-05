<?php

namespace EmploybrandAmbassador\Entity;


class CandidateFieldEntity extends AbstractEntity
{

    public ?int $id = null;

    public array $name = [];

    public ?string $type = null;

    public bool $required = false;

    public array $options = [];

    public array $value = [];

}
