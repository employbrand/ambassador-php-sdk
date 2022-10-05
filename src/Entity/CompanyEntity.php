<?php

namespace EmploybrandAmbassador\Entity;


class CompanyEntity extends AbstractEntity
{

    protected $exclude = [
        'candidateFields'
    ];

    public ?int $id = null;

    public ?string $name = null;

    public ?string $mainEnvironmentName = null;

    public bool $mobileAppActive = false;

    public ?string $code = null;

    public ?string $email = null;

    public ?string $hubUrl = null;

    public ?string $applicationId = null;

    public array $environmentTypes = [];

    public bool $isDemo = false;

    public array $styling = [];

    public array $emailStyling = [];

    public ?string $defaultLanguage = null;

    public array $languages = [];

    public ?string $clickTrackingType = null;

    public ?string $customTrackingUrl = null;

    public array $mobileText = [];

    public array $mobileStyling = [];

    public array $text = [];

    public array $points = [];

    public array $defaultAllowedDomains = [];

    public bool $leaderboardActive = true;

    public array $candidateFields = [];

    public array $newOrderNotificationEmails = [];

    public array $extraPages = [];

    public ?string $postPreviewUrl = null;

    public ?string $oauthProviders = null;

    public bool $allowRegistrationWithPassword = true;

    public array $addOns = [];


    public function build(array $parameters): void
    {
        parent::build($parameters);

        $this->candidateFields = \array_map(function ($entity) {
            return new CandidateFieldEntity($entity);
        }, $parameters[ 'candidate_fields' ]);
    }

}
