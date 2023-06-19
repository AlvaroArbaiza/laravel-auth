<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // prendiamo l'array dalla cartella config per ciclarlo e poi usarlo per riempure la tabella
        $project = config('projects');

        foreach ($project as $element) {
            $newProject = new Project();
            $newProject->title = $element['title'];
            $newProject->description = $element['description'];
            $newProject->slug = Str::slug( $newProject->title , '-');
            $newProject->customer = $element['customer'];
            $newProject->type_customer = $element['type_customer'];
            $newProject->price = $element['price'];
            $newProject->created = $element['created'];
            $newProject->save();
        }
    }
}
