<?php

namespace Database\Seeders;

use App\Models\portofolioScreenshotModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PortfolioScreenshotSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'portfolio_id' => 1,
                'screenshot' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4c5032bb-b1a5-4834-b35f-19c6149114d9.png',
                'created_at' => Carbon::now(),
            ],
            [
                'portfolio_id' => 1,
                'screenshot' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e45a0d95-c0da-495c-9f4d-f99c93c25086.png',
                'created_at' => Carbon::now(),
            ],
            [
                'portfolio_id' => 2,
                'screenshot' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/be5f2c71-e8e6-415a-bdf0-fc145070c073.png',
                'created_at' => Carbon::now(),
            ],
            [
                'portfolio_id' => 3,
                'screenshot' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bcabad31-3d36-4d8a-a925-e8d69831454f.png',
                'created_at' => Carbon::now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

       foreach ($data as $d) {
            portofolioScreenshotModel::create($d);
        }
    }
}
