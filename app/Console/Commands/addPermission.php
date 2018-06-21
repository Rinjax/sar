<?php

namespace App\Console\Commands;

use App\Models\Permissions;
use Illuminate\Console\Command;

class addPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:permission {permission}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $permission = $this->argument('permission');

        Permissions::create([
            'permission' => $permission
        ]);

        $this->line($permission . ' created');
    }
}
