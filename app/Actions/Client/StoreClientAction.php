<?php


namespace App\Actions\Client;


use App\Actions\Config\ReadConfigAction;
use App\Actions\Config\StoreClientToConfigAction;
use App\DataTransfers\ClientData;
use App\Repositories\Client\ClientRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class StoreClientAction
{
    protected ClientRepositoryInterface $clientRepository;

    protected StoreClientToConfigAction $storeClientToConfigAction;

    /**
     * StoreClientAction constructor.
     * @param ClientRepositoryInterface $clientRepository
     * @param StoreClientToConfigAction $storeClientToConfigAction
     */
    public function __construct(ClientRepositoryInterface $clientRepository, StoreClientToConfigAction $storeClientToConfigAction)
    {
        $this->clientRepository = $clientRepository;
        $this->storeClientToConfigAction = $storeClientToConfigAction;
    }

    public function execute(ClientData $data): bool|string
    {
        $uuid = Uuid::uuid4()->toString();
        $data->uuid = $uuid;

        $create = array_merge($data->toArray(), [
            'user_id' => Auth::guard('sanctum')->user()->id,
            'started_at' => now(),
            'finished_at' => now()->addMonth(),
        ]);

        DB::beginTransaction();
        try {
            $this->storeClientToConfigAction->execute($uuid);
            $client = $this->clientRepository->create($create);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
            return $exception->getMessage();
        }

        return $client;
    }
}
