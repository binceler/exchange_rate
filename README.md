PHP DEVELOPER STUDY CASE

## Kurulum

Laravel install
```bash
composer install
```

Veritabanlarını oluşturma
```bash
php artisan migrate
```

İş listelerini veritabanına kaydetme
```bash
php artisan todo:create-exchange-rate
```

## Yeni Provider Api Eklenmesi

app/Http/exchangeRateList klasörü altına 'BaseProviderAbstract' class'ından türetilerek yeni Provider dosyası oluşturulmalıdır. Ardından config/exchange_rate_lists.php dosyasına oluşturulan dosyanın adı yazılmalıdır.
