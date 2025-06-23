<?php
namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Models\RoomPack;
use App\Models\RoomPackFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRoomPackRequest;

class RoomPackController extends Controller
{
    public function create()
    {
        return view('designer.upload');
    }

    public function store(StoreRoomPackRequest $request)
    {
        $roomPack = RoomPack::create([
            'designer_id' => auth()->id(),
            'title' => $request->title,
        ]);

        if ($request->hasFile('cover')) {
            $roomPack->files()->create([
                'type' => 'cover',
                'file_path' => $request->file('cover')->store('room_packs'),
            ]);
        }

        if ($request->hasFile('optional_renders')) {
            foreach ($request->file('optional_renders') as $file) {
                $roomPack->files()->create([
                    'type' => 'optional',
                    'file_path' => $file->store('room_packs'),
                ]);
            }
        }

        if ($request->hasFile('pdf')) {
            $roomPack->files()->create([
                'type' => 'pdf',
                'file_path' => $request->file('pdf')->store('room_packs'),
            ]);
        }

        if ($request->hasFile('chart')) {
            $roomPack->files()->create([
                'type' => 'chart',
                'file_path' => $request->file('chart')->store('room_packs'),
            ]);
        } elseif ($request->chart_link) {
            $roomPack->files()->create([
                'type' => 'chart',
                'external_link' => $request->chart_link,
            ]);
        }

        return redirect()->route('designer.dashboard')->with('success', 'Room Pack uploaded!');
    }
}
