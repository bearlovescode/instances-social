<?php
    namespace Bearlovescode\InstancesSocial\Models;

    use Bearlovescode\Datamodels\DataModel;

    class MastodonInstance extends DataModel
    {

        public ?string $id;

        public ?string $name;

        public ?bool $open_registrations = false;

        public ?string $version;

        public ?bool $up = false;
        public ?bool $dead = false;

        public ?bool $ipv6 = false;

        public ?float $uptime = 0.0;

        public ?int $https_score = 0;
        public ?string $https_rank;
        public ?int $obs_score = 0;

        public ?string $obs_rank;
        public ?int $users = 0;
        public ?int $statuses = 0;
        public ?int $connections = 0;

    }