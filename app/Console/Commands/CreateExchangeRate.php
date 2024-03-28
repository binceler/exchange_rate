<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CreateExchangeRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo:create-exchange-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Döviz kuru bilgileirni kaydeder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return string
     * @throws \Throwable
     */
    public function handle()
    {
        if ($this->confirm('Döviz kuru bilgileri kaydedilecek onaylıyor musunuz?', true)) {

            $this->line('Döviz kurları kayıt işlemi başladı.');

            foreach (config('exchange_rate_lists') as $providerName) {
                $fullPath = file_exists(dirname(__DIR__, 2).'/Http/exchangeRateList/'. $providerName . '.php');
                if ($fullPath) {
                    $className = '\\App\\Http\\exchangeRateList\\' . $providerName;

                    $this->info($providerName . ' isimli döviz kur bilgisi listesi eklenmeye başladı.');

                    $getList = (new $className)->getList();
                    if ($getList) {
                        $this->info($providerName . ' isimli döviz kur listesi ekleme işlemi tamamlandı.');
                    } else {
                        $this->info($providerName . ' isimli döviz kur listesi ekleme işleminde hata oluştu.');
                    }
                }

            }

            Cache::flush();
            $this->info('Tüm cache silindi.');

            $this->line('Döviz kur listeleri kayıt işlemi tamamlandı.');
        }
    }
}
