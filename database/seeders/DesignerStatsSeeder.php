<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RoomPack;
use App\Models\TimeLog;
use App\Models\Revision;
use App\Models\Payment;

class DesignerStatsSeeder extends Seeder
{
    public function run(): void
    {
        $designer = User::where('email', 'designer@demo.com')->first();

        if (!$designer) {
            $this->command->warn('Designer not found. Please create a user with email designer@demo.com first.');
            return;
        }

        $roomPack = RoomPack::firstOrCreate(
            ['designer_id' => $designer->id, 'title' => 'Sample Room Pack'],
            ['title' => 'Sample Room Pack']
        );

        TimeLog::create([
            'designer_id' => $designer->id,
            'room_pack_id' => $roomPack->id,
            'hours' => 6,
            'log_date' => now()->subDays(1),
        ]);

        Revision::create([
            'room_pack_id' => $roomPack->id,
            'notes' => 'Client requested updated wall texture.',
            'created_by' => $designer->id,
        ]);

        Payment::create([
            'designer_id' => $designer->id,
            'amount' => 2500.00,
            'status' => 'paid',
            'paid_on' => now(),
        ]);

        $this->command->info('Dummy designer stats seeded: hours, revision, and payment.');
    }
}
