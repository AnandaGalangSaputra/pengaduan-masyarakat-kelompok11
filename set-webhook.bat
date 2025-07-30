@echo off
set /p NGROK_URL=Masukkan URL ngrok HTTPS: 
set "BOT_TOKEN=7415534020:AAEusy5reKt7tVVQ9Dp9J5maCt1BTveFNmw"
set "FULL_URL=%NGROK_URL%/api/telegram/webhook"

curl -s -X POST https://api.telegram.org/bot%BOT_TOKEN%/setWebhook -d "url=%FULL_URL%"

echo.
echo [Selesai] Webhook dikirim ke: %FULL_URL%
pause
