<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveFakeAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fakeAccounts:remove';

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
        $currentDate = Carbon::now();

        $fakeAccounts = User::select('id')
            ->whereBetween('created_at', [$currentDate->startOfWeek(), $currentDate->endOfWeek()])
            ->doesntHave('tweets')
            ->doesntHave('followers')
            ->doesntHave('follows')
            ->get();

        return User::whereIn('id', $fakeAccounts->pluck('id'))->delete();
    }
}
