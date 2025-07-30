<?php
namespace App\Http\Controllers;

use App\Models\TelegramUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    protected $token = '7415534020:AAEusy5reKt7tVVQ9Dp9J5maCt1BTveFNmw';

   public function webhook(Request $request)
    {
        $data = $request->all();
        Log::info('Telegram Request:', $data);

        if (isset($data['message'])) {
            $chat_id = $data['message']['chat']['id'];
            $text = $data['message']['text'] ?? '';
            $username = $data['message']['from']['username'] ?? null;

            if (!$username) {
                $this->sendText($chat_id, "⚠️ Anda belum memiliki username di Telegram.\n\nSilakan buka *Pengaturan > Edit Profil* lalu tambahkan *username publik*.\nSetelah itu kirim pesan /start lagi.");
                return response('ok', 200);
            }

            try {
                TelegramUser::updateOrCreate(
                    ['chat_id' => $chat_id],
                    ['username' => $username]
                );
            } catch (\Exception $e) {
                Log::error('Gagal simpan user Telegram:', [
                    'chat_id' => $chat_id,
                    'username' => $username,
                    'error' => $e->getMessage(),
                ]);
                $this->sendText($chat_id, "❌ Terjadi kesalahan saat menyimpan data Anda. Coba beberapa saat lagi.");
                return response('ok', 500);
            }

            $this->sendMenu($chat_id);
        }

        elseif (isset($data['callback_query'])) {
            $chat_id = $data['callback_query']['message']['chat']['id'];
            $message_id = $data['callback_query']['message']['message_id'];
            $data_callback = $data['callback_query']['data'];

            if ($data_callback === 'help') {
                $this->editMessage($chat_id, $message_id, "📝 Silakan kembali ke website untuk membuat pengaduan.");
            } elseif ($data_callback === 'deskripsi') {
                $this->editMessage($chat_id, $message_id, "📖 Bot ini dirancang untuk menerima pengaduan masyarakat.");
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
            'text' => "🎉 Halo! Selamat Datang di *Pengaduan Masyarakat!*\n\nSilakan pilih menu di bawah ini:",
            'parse_mode' => 'Markdown',
            'reply_markup' => json_encode([
                'inline_keyboard' => $keyboard
            ]),
        ]);
    }

    protected function sendText($chat_id, $text)
    {
        Http::post("https://api.telegram.org/bot{$this->token}/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => 'Markdown'
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
