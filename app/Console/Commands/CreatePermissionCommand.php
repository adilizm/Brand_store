<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class CreatePermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:permission {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command allow to create permission from terminal using --name= as name of it';

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
     * @return int
     */
    public function handle()
    {
        $permission_name = $this->option('name');
        Permission::create(['name'=>$permission_name]);
        $this->info('permission created');
    }
}
