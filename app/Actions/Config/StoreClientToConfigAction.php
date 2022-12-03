<?php


namespace App\Actions\Config;


class StoreClientToConfigAction
{
    protected ReadConfigAction $readConfigAction;

    /**
     * StoreClientToConfigAction constructor.
     * @param ReadConfigAction $readConfigAction
     */
    public function __construct(ReadConfigAction $readConfigAction)
    {
        $this->readConfigAction = $readConfigAction;
    }

    public function execute(string $uuid)
    {
        $clients = $this->readConfigAction->getClients();
        $clients = array_merge($clients, [
            [
                'id' => $uuid,
                'level' => 1,
                'alterId' => 0,
            ]
        ]);
        $this->readConfigAction->getConfig()->inbounds[0]->settings->clients = $clients;
        $config = json_encode($this->readConfigAction->getConfig(), JSON_PRETTY_PRINT);
        file_put_contents($this->readConfigAction->getConfigPath(), $config);
    }
}
