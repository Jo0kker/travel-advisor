<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddRoleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-role-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = $this->choice('Which role?', ['admin', 'user'], 1);
        $user = $this->ask('Which user?');

        $user = User::where('email', $user)->first();

        if (!$user) {
            $this->error('User not found');
            return;
        }

        $user->assignRole($role);

        $this->info('Role added');
    }
}
