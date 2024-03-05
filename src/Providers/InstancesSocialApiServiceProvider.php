<?php
    namespace Bearlovescode\InstancesSocial\Providers;

    use Bearlovescode\InstancesSocial\Clients\InstanceApiClient;
    use Bearlovescode\InstancesSocial\Models\ApiClientConfiguration;
    use Bearlovescode\InstancesSocial\Services\InstanceApiService;
    use Illuminate\Support\ServiceProvider;

    class InstancesSocialApiServiceProvider extends ServiceProvider
    {

        public function register(): void
        {
            $this->app->singleton(InstanceApiService::class, function () {
                return new InstanceApiService(
                    new InstanceApiClient($this->getConfiguration())
                );
            });
        }

        public function getConfiguration(): ApiClientConfiguration
        {
            return new ApiClientConfiguration([
                'secretToken' => env('INSTANCE_SOCIAL_SECRET')
            ]);
        }
    }
