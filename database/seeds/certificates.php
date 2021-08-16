<?php

use App\Models\certificate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class certificates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certificates')->delete();

        $certificates = [
            'Arabic', 'English', 'French', 'Math', 'Sciences', 'physic',
            'chemistry', 'geography', 'history', 'music', 'art', 'sport'
        ];
        foreach ($certificates as  $certificate) {
            certificate::create(['name' => $certificate]);
        }
    }
}
