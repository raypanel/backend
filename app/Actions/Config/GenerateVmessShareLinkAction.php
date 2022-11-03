<?php


namespace App\Actions\Config;


class GenerateVmessShareLinkAction
{
    protected string $address;

    public function __construct()
    {
        $this->address = config('provider.vmess_address');
    }

    public function execute(string $uuid, string $name)
    {
        $shareLinkBase = [
            'add' => $this->address,
            "aid" => "0",
            "host" => "",
            "id" => $uuid,
            "net" => "ws",
            "path" => "/",
            "port" => "443",
            "ps" => $name,
            "scy" => "auto",
            "sni" => "",
            "tls" => "tls",
            "type" => "",
            "v" => "2"
        ];

        return "vmess://" . base64_encode(json_encode($shareLinkBase));
    }
}
