<?php
    namespace Bearlovescode\InstancesSocial\Services;

    use Bearlovescode\InstancesSocial\Clients\InstanceApiClient;
    use Bearlovescode\InstancesSocial\Exceptions\InvalidApiDataException;
    use Bearlovescode\InstancesSocial\Models\MastodonInstance;
    use Illuminate\Support\Collection;

    class InstanceApiService
    {
        public function __construct(
            private readonly InstanceApiClient $client
        )
        {
        }

        /**
         * @return \Illuminate\Support\Collection
         * @throws InvalidApiDataException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function listInstances(): Collection
        {
            if (!$data = $this->client->listInstances())
                throw new InvalidApiDataException();

            $results = collect();
            foreach ($data->instances as $record)
                $results->push(new MastodonInstance($record));

            return $results;
        }
    }