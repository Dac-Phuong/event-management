<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    // Load the helper file
    $helperFile = app_path('Helpers/CustomHelper.php');

    if (file_exists($helperFile)) {
      require_once ($helperFile);
    }
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    //
  }
}
