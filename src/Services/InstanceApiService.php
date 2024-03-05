<?php
    namespace Bearlovescode\InstancesSocial\Services;

    use Bearlovescode\InstancesSocial\Clients\InstanceApiClient;

    class InstanceApiService
    {
        public function __construct(
            private readonly InstanceApiClient $client
        )
        {
        }

        public function listInstances()
        {
            $data = $this->client->listInstances();
        }
    }