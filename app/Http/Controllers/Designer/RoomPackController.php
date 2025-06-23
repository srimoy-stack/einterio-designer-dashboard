<?php

namespace App\Http\Controllers\Designer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomPackRequest;
use App\Models\RoomPack;
use App\Traits\HandlesRoomPackUploads;

class RoomPackController extends Controller
{
    use HandlesRoomPackUploads;

    public function create()
    {
        return view('designer.upload');
    }


    public function store(StoreRoomPackRequest $request)
    {
        $roomPack = RoomPack::createForDesigner($request->only('title'));

        $this->storeRoomPackFiles($roomPack, $request);

        return redirect()
            ->route('designer.dashboard')
            ->with('success', 'Room pack uploaded successfully.');
    }


}
