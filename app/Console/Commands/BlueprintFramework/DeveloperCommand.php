<?php

namespace Pterodactyl\Console\Commands\BlueprintFramework;

use Illuminate\Console\Command;
use Pterodactyl\BlueprintFramework\Libraries\ExtensionLibrary\Console\BlueprintConsoleLibrary as BlueprintExtensionLibrary;

class DeveloperCommand extends Command
{
  protected $description = 'Check if Blueprint developer mode is enabled';
  protected $signature = 'bp:developer';

  /**
   * DeveloperCommand constructor.
   */
  public function __construct(
    private BlueprintExtensionLibrary $blueprint,
  ) {
    parent::__construct();
  }

  /**
   * Handle execution of command.
   */
  public function handle()
  {
    $developer = $this->blueprint->dbGet('blueprint', 'developer', 'false') === 'true';
    if ($developer) {
      echo ("true");
      return;
    }
    echo ("false");
  }
}