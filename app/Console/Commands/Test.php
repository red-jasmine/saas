<?php

namespace App\Console\Commands;


use App\Models\Tenant;
use Illuminate\Console\Command;
use RedJasmine\Admin\Domain\Models\Admin;


class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

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


        //
        Admin::create([
            'email'=>'admin@qq.com',
            'name'=>'super_admin',
            'password'=>'123456'
        ]);
        return;

        $tenant = Tenant::find(1);
        $tenant->run(function () {

            Admin::create([
                'email'=>'admin@qq.com',
                'name'=>'super_admin',
                'password'=>'123456'
            ]);



        });
    }
}
