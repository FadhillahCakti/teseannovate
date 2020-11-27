<?php return array (
  'barryvdh/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Cors\\ServiceProvider',
    ),
  ),
  'dreamonkey/laravel-cloudfront-url-signer' => 
  array (
    'providers' => 
    array (
      0 => 'Dreamonkey\\CloudFrontUrlSigner\\CloudFrontUrlSignerServiceProvider',
    ),
    'aliases' => 
    array (
      'CloudFrontUrlSigner' => 'Dreamonkey\\CloudFrontUrlSigner\\Facades\\CloudFrontUrlSigner',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/cashier' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Cashier\\CashierServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'matthewbdaly/laravel-azure-storage' => 
  array (
    'providers' => 
    array (
      0 => 'Matthewbdaly\\LaravelAzureStorage\\AzureStorageServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nikolag/core' => 
  array (
    'providers' => 
    array (
      0 => 'Nikolag\\Core\\Providers\\MigrationServiceProvider',
      1 => 'Nikolag\\Core\\Providers\\CoreServiceProvider',
    ),
    'facades' => 
    array (
      0 => 'Nikolag\\Core\\Facades\\CoreService',
    ),
  ),
  'nikolag/laravel-square' => 
  array (
    'providers' => 
    array (
      0 => 'Nikolag\\Square\\Providers\\SquareServiceProvider',
    ),
    'aliases' => 
    array (
      'Square' => 'Nikolag\\Square\\Facades\\Square',
    ),
  ),
  'sentry/sentry-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Sentry\\Laravel\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Sentry' => 'Sentry\\Laravel\\Facade',
    ),
  ),
);