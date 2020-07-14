<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Room;
use App\Note;
use Illuminate\Http\Request;


class RoomController extends Controller
{
    // FIND Rooms
    public function showAllRooms()
    {
        return response()->json(Room::all());
    }
    public function showOneRoom($room_id)
    {
        return response()->json(Room::find($room_id));
    }
    // CRUD Rooms
    public function createRoom(Request $request)
    {
        $room = Room::create($request->all());
        return response()->json($room, 201);
    }
    public function updateRoom($room_id, Request $request)
    {
        $room = Room::findOrFail($room_id);
        $room->update($request->all());
        return response()->json($room, 200);
    }
    public function deleteRoom($room_id)
    {
        Room::findOrFail($room_id)->delete();
        return response('Deleted Successfully', 200);
    }

    // CRUD Books
    public function createNote($room_id, Request $request)
    {
        $room = Room::find($room_id);
        $note = Note::create([
            'user' => $request->user,
            'room_id' => $room->id,
            'content' => $request->content
        ]);
        return response()->json($note, 201);
    }

      // FIND Books
    public function showAllNotes()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }
    public function showAllNotesFromRoom($room_id)
	{
    try {
        $room = Room::findOrFail($room_id);
    } catch(ModelNotFoundException $e) {
        return response('Room not found', 404);
    }
        $notes = $room->notes;
        return response()->json($notes, 200);
}

    public function updateNote($room_id, $note_id, Request $request)
    {
        $room = Room::find($room_id);
        $note = $room->notes
                       ->where('id', '=', $note_id)
                       ->first()
                       ->update($request->all());
        return response()->json($book, 200);
    }
    public function deleteNote($room_id, $note_id)
    {
        $room = Room::find($room_id);
        $note = $room->notes
                       ->where('id', '=', $note_id)
                       ->first()
                       ->delete();
        return response('Note Deleted Successfully', 200);
    }
}