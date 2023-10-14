<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notify($id)
    {
        $notify = Notification::findOrFail($id);
        $notify->status = 1;
        $notify->save();

        return redirect()->back();
    }
}
