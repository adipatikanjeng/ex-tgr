<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;
use App\Models\Cart\Product;

class RemoveCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:remove';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove cart after 2 x 24 hour / 2 days.';

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
        $date = date('Y-m-d');
        $cartModel = Cart::where('updated_at', '<=' ,  date('Y-m-d', strtotime('-2 days', strtotime($date))))->delete();
        $this->info('Remove cart successfull!');
    }
}
