<?php

namespace App\Console\Commands;

use App\Http\Controllers\BuyerController;
use App\Models\buyer;
use App\Models\login;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cookie;

class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Minute:Update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post Notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $log = login::all();
        $num = count($log);
        //echo ($num);
        if ($num > 50) {
            $i = $num - 50;
            foreach ($log as $item) {
                if ($item->logout_time != "NULL") {
                    //echo ($item->id . "\n");
                    if ($i > 0) {
                        login::where("id", $item->id)->delete();

                        echo ("delete" . $item->id . "\n");
                        $i = $i - 1;
                    }
                }
            }
        }
    }
}
