<?php

namespace App\Console\Commands;


use App\Models\Cars;
use App\Models\Currencies;
use App\Repositories\Cars\CarRepositoryInterface;
use App\Services\AbstractApi\AbstractApiService;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class SynchronizationCars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:synchronization';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronization of car`s';

    /**
     * Execute the console command.
     */
    public function handle(CarRepositoryInterface $rep)
    {
        $client = new AbstractApiService();
        $result = $client->live();

        foreach ($result->exchange_rates as $key => $value) {
            if (is_null($rep->getOne($key))) {
                $rep->store([
                    'name' => (string) $key,
                    'year' => (integer) $value,
                    'description' => "Car: $key"
                ]);
                Cars::create([
                ]);
            }
            else {
                $rep->update((string)$key, [
                    'year' => (integer) $value,
                ]);
            }
        }
    }
}
