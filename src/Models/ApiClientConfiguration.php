<?php
    namespace Bearlovescode\InstancesSocial\Models;

    use Bearlovescode\Datamodels\DataModel;

    class ApiClientConfiguration extends DataModel
    {
        public ?string $secretToken;
        public string $userAgent;
    }