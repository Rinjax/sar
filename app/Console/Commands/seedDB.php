<?php

namespace App\Console\Commands;

use App\Managers\SeedManager;
use App\Models\roles;
use Illuminate\Console\Command;

class seedDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $seedManager;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->seedManager = new SeedManager();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $members = config('database.seed.members');
        $dogs = config('database.seed.dogs');
        $roles = config('database.seed.roles');
        $permissions = config('database.seed.permissions');

        foreach($members as $member){
            $this->line($member);
            $this->seedManager->addMember($member);
        }

        foreach($dogs as $dog){
            $this->line($dog);
            $this->seedManager->addDog($dog);
        }

        foreach($roles as $role){
            roles::create([
                'role' => $role
            ]);
        }

        foreach($permissions as $permission){
            roles::create([
                'permission' => $permission
            ]);
        }
    }
}
