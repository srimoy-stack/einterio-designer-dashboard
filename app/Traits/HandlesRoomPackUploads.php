<?php

namespace App\Traits;

trait HandlesRoomPackUploads
{
    public function storeRoomPackFiles($roomPack, $request)
    {
        // Cover image
        if ($request->hasFile('cover')) {
            $roomPack->files()->create([
                'type' => 'cover',
                'file_path' => $request->file('cover')->store('room_packs'),
            ]);
        }

        // PDF
        if ($request->hasFile('pdf')) {
            $roomPack->files()->create([
                'type' => 'pdf',
                'file_path' => $request->file('pdf')->store('room_packs'),
            ]);
        }

        // Chart CSV file
        if ($request->hasFile('chart')) {
            $roomPack->files()->create([
                'type' => 'chart',
                'file_path' => $request->file('chart')->store('room_packs'),
            ]);
        }

        // Optional renders
        collect($request->file('optional_renders', []))->each(function ($file) use ($roomPack) {
            $roomPack->files()->create([
                'type' => 'optional',
                'file_path' => $file->store('room_packs'),
            ]);
        });

        // Optional chart link
        if ($request->filled('chart_link')) {
            $roomPack->files()->create([
                'type' => 'chart',
                'external_link' => $request->chart_link,
            ]);
        }
    }
}
