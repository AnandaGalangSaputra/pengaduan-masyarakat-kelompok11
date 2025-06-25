<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    protected $token = '7415534020:AAEusy5reKt7tVVQ9Dp9J5maCt1BTveFNmw';

    public function webhook(Request $request)
    {
        $data = $request->all();

        if (isset($data['message'])) {
            $chat_id = $data['message']['chat']['id'];
            $text = $data['message']['text'] ?? '';

            if ($text === '/start') {
                $this->sendMenu($chat_id);
            } else {
                $this->sendMenu($chat_id); // semua pesan akan kirim menu juga
            }
        } elseif (isset($data['callback_query'])) {
            $chat_id = $data['callback_query']['message']['chat']['id'];
            $message_id = $data['callback_query']['message']['message_id'];
            $data_callback = $data['callback_query']['data'];

            if ($data_callback === 'help') {
                $this->editMessage($chat_id, $message_id, "Silahkan kembali ke website untuk membuat pengaduan.");
            } elseif ($data_callback === 'deskripsi') {
                $this->editMessage($chat_id, $message_id, "📖 Deskripsi Bot:\nBot ini dirancang untuk menerima pengaduan masyarakat.");
            }
        }

        return response('ok', 200);
    }

    protected function sendMenu($chat_id)
    {
        $keyboard = [
            [
                ['text' => '❓ Bagaimana Cara Kirim Aduan', 'callback_data' => 'help']
            ],
            [
                ['text' => '📖 Deskripsi', 'callback_data' => 'deskripsi']
            ],
            [
                ['text' => '🌐 Website Pengaduan', 'url' => 'https://your-website-url.com']
            ],
        ];

        Http::post("https://api.telegram.org/bot{$this->token}/sendMessage", [
            'chat_id' => $chat_id,
            'text' => "🎉 Halo! Selamat Datang di Pengaduan Masyarakat!\nSilakan pilih menu di bawah ini:",
            'reply_markup' => json_encode([
                'inline_keyboard' => $keyboard
            ]),
        ]);
    }

    protected function editMessage($chat_id, $message_id, $text)
    {
        Http::post("https://api.telegram.org/bot{$this->token}/editMessageText", [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => $text,
        ]);
    }
}
