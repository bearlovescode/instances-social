<?php
    namespace Bearlovescode\InstancesSocialClient\Services;

    use Bearlovescode\InstancesSocialClient\Clients\InstanceApiClient;

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