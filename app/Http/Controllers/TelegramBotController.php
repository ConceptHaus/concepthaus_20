<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function updatedActivity()
    {
        $activity = Telegram::getMe();
        return response()->json($activity);
    }
}
