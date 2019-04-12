<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserMessageController extends Controller
{
    public function pushmsg(Request $request)
    {
        $msgdata = $request->only('data')['data'];
        $uid = $request->only('user')['user'];
        $time = date('Y-m-d H:i:s');
        $res = DB::insert('INSERT INTO posts(sender_id, msg_content, send_time) VALUES (?, ?, ?)', [$uid, $msgdata, $time]);
        return response()->json($res);
    }

    public function getmsg(Request $request)
    {

    }
}
