from telegram import Update, InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import Application, CommandHandler, ContextTypes, CallbackQueryHandler, MessageHandler, filters

TOKEN = "7415534020:AAEusy5reKt7tVVQ9Dp9J5maCt1BTveFNmw"  # Ganti dengan token bot Anda

async def start(update: Update, context: ContextTypes.DEFAULT_TYPE):
    keyboard = [
        [InlineKeyboardButton("❓ Bagaimana Cara Kirim Aduan", callback_data='help')],
        [InlineKeyboardButton("📖 Deskripsi", callback_data='deskripsi')],
        [InlineKeyboardButton("🌐 Website Pengaduan", url='https://your-website-url.com')]
    ]
    reply_markup = InlineKeyboardMarkup(keyboard)
    await update.message.reply_text(
        "🎉 Halo! Selamat Datang di Pengaduan Masyarakat!\n"
        "Anda dapat mengirimkan aduan melalui website yang telah disediakan.\n\n"
        "Silakan pilih menu di bawah ini:",
        reply_markup=reply_markup
    )

async def button_callback(update: Update, context: ContextTypes.DEFAULT_TYPE):
    query = update.callback_query
    await query.answer()
    
    if query.data == 'help':
        await query.edit_message_text("Silahkan Kembali ke Website untuk membuat pengaduan.\n\n"
                                      "Jika ada pertanyaan, Silahkan cek di website atau hubungin call center yang tersedia.")
    elif query.data == 'deskripsi':
        await query.edit_message_text("📖 Deskripsi Bot:\nBot ini dirancang untuk menerima pengaduan masyarakat.")

# Handler untuk semua pesan teks (non-command)
async def handle_message(update: Update, context: ContextTypes.DEFAULT_TYPE):
    # Kirim kembali menu utama jika user mengirim pesan apa pun
    await start(update, context)

def main():
    application = Application.builder().token(TOKEN).build()
    
    # Command
    application.add_handler(CommandHandler("start", start))
    
    # Callback query untuk inline keyboard
    application.add_handler(CallbackQueryHandler(button_callback))
    
    # Handler untuk semua pesan teks (kecuali command)
    application.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, handle_message))
    
    print("Bot sedang berjalan...")
    application.run_polling()

if __name__ == "__main__":
    main()