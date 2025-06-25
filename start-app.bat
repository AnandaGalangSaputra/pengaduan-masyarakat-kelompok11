@echo off
title Pengaduan Masyarakat - Launcher
color 0A
setlocal enabledelayedexpansion

:menu
cls
echo =============================================
echo     SISTEM PENGADUAN MASYARAKAT - UTS
echo =============================================
echo.
echo [1] Jalankan Aplikasi
echo [2] Hentikan Aplikasi
echo [0] Keluar
echo.

set /p pilih=Masukkan pilihan: 

if "%pilih%"=="1" goto mulai
if "%pilih%"=="2" goto hentikan
if "%pilih%"=="0" exit
goto menu

:mulai
cls
echo --------------------------------------------
echo Menjalankan semua service...

REM ====== JALANKAN BACKEND (Laravel) ======
start "" /min cmd /c "cd backend && php artisan serve --port=8000"
echo ✅ Backend Laravel dijalankan di: http://localhost:8000/

REM ====== JALANKAN FRONTEND (Vue) ======
start "" /min cmd /c "cd frontend && npm run dev"
echo ✅ Frontend dijalankan di: http://localhost:5173/

REM ====== JALANKAN NGROK DI TERMINAL AKTIF ======
start "" cmd /k "ngrok http 8000"
echo ⏳ Ngrok sedang dibuka di terminal... Silakan salin URL-nya

REM ====== JALANKAN SET-WEBHOOK.BAT DI TERMINAL BARU ======
start "" cmd /k "set-webhook.bat"
echo 🔗 Webhook Telegram dikirim via set-webhook.bat

echo --------------------------------------------
echo ✅ Semua service sudah berjalan.
echo.
echo 🌐 Frontend : http://localhost:5173/
echo 🧩 Backend  : http://localhost:8000/
echo 🔗 Ngrok    : buka terminal ngrok
echo 🛰️ Webhook  : kirim otomatis lewat set-webhook.bat
echo --------------------------------------------
pause
goto menu

:hentikan
echo 🔻 Menghentikan semua proses...

taskkill /f /im node.exe >nul 2>&1
taskkill /f /im php.exe >nul 2>&1
taskkill /f /im ngrok.exe >nul 2>&1
taskkill /f /im curl.exe >nul 2>&1

echo ✅ Semua proses berhasil dihentikan.
pause
goto menu
