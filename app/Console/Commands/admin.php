<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will create a super admin';

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
        if (!User::where('email','=','ravihashimi@gmail.com')->first()){
        User::create([
            'name' => 'Ravi',
            'email' => 'ravihashimi@gmail.com',
            'user_type' => 'admin',
            'password' => Hash::make('php@1234'),
            'email_verified_at' => '2022-07-10 18:19:10'
        ]);
        $this->info('created successfully');
    }
    else{
        $this->warn('already exist');
    }
        return 0;
    }
}
