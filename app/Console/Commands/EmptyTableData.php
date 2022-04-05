<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\TableDataRemoveHelper;

class EmptyTableData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'table:removedata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Table Data';

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
        $obj = new TableDataRemoveHelper();
        $getHelperData = $obj->removeData();
        dd($getHelperData);
    }
}
