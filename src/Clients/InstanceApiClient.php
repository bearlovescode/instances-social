<?php
    namespace Bearlovescode\InstancesSocial\Clients;

    use Bearlovescode\InstancesSocial\Exceptions\InvalidConfigurationException;
    use Bearlovescode\InstancesSocial\Models\ApiClientConfiguration;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Psr7\Request;

    class InstanceApiClient {
        const BASE_URI = "https://instances.social/api/";
        protected Client $client;

        public function __construct(
            private readonly ApiClientConfiguration $config
        ) {

            $this->validateConfig($config);


            $this->client = new Client([
                'base_uri' => self::BASE_URI
            ]);
        }

        /**
         * @param array $filters
         * @return mixed
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @todo Implement filters.
         */
        public function listInstances(array $filters = [])
        {
            try {
                $req = new Request('GET', '1.0/instances/list');
                $req->withAddedHeader('Authorization', sprintf('Bearer %s', $this->config->secretToken));
                $res = $this->client->send($req);

                return json_decode($res->getBody()->getContents());
            }

            catch (ClientException $e)
            {
                throw $e;
            }
        }

        /**
         * @param ApiClientConfiguration $config
         * @return void
         * @throws InvalidConfigurationException
         */
        private function validateConfig(ApiClientConfiguration $config): void
        {
            if (empty($config->secretToken))
                throw new InvalidConfigurationException('Missing API secret token.');
        }

    }