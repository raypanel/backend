<?php


namespace App\Actions\Config;


class ReadConfigAction
{
    protected string $configPath;

    protected array $clients = [];

    protected $config;

    public function __construct()
    {
        $this->configPath = config('provider.vmess_path');
        $this->config = json_decode(file_get_contents($this->configPath));
        $this->setClients();
    }

    public function getConfig()
    {
         return $this->config;
    }

    /**
     * @param array $clients
     */
    public function setClients(): void
    {
        $this->clients = $this->config->inbounds[0]->settings->clients;
    }

    /**
     * @return array
     */
    public function getClients(): array
    {
        return $this->clients;
    }
}
