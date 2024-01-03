<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LmsForm;
use App\Models\WhatsappScheduler;
use Illuminate\Support\Facades\Http;
use App\Helpers\LogHelper;
use App\Helpers\Helper;
use App\Models\CarModel;
use App\Models\ModelAssignMenu;
use App\Models\Menu;
use App\Models\MessageHistory;
use App\Models\SubscribeUser;
use App\Models\MenuLevelMap;
use App\Models\BmwDealer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;


class whatsapp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whatsapp:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send welcome message to whatsapp';

    private static $token = '';

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

        return 0;
    }
}
