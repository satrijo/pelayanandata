<?php

namespace Database\Seeders;

use App\Models\Workflow;
use Illuminate\Database\Seeder;

class WorkflowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workflows = new Workflow;
        $workflows->title = 'alur';
        $workflows->value = '';
        $workflows->save();
    }
}
