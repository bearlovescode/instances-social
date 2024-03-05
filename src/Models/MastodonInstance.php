<?php
    namespace Bearlovescode\InstancesSocial\Models;

    use Bearlovescode\Datamodels\DataModel;

    class MastodonInstance extends DataModel
    {

        public string $id;

        public string $name;

        public string $registrations;

        public string $version;

        public string $ipv6;

        public float $uptime;

        public string $https_score;
        public string $obs_score;
        public int $users = 0;
        public int $statuses = 0;

        public int $connections = 0;

    }