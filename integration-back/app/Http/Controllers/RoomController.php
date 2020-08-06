<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Republic;
use App\Room;

class RoomController extends Controller
{
    public function createRoom(Request $request) {
        $room = new Room;
        $room->price = $request->price;
        $room->republic_id = $request->republic_id;
        $room->save();
        return response()->json($room);
    }

    public function deleteRoom($id){
        Room::destroy($id);
        return response()->json(['O seu quarto foi deletado com sucesso.']);
    }

    public function addRepublic($id, $room_id){
        $room = Room::findOrFail($id, $room_id);
        $room->republic_id = $id;
        $room->save();
        return response()->json($room);
    }
}
