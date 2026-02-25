@echo off
echo ========================================
echo Website Settings Setup
echo ========================================
echo.

echo Step 1: Dumping autoload...
call composer dump-autoload
echo.

echo Step 2: Running migrations...
call php artisan migrate
echo.

echo Step 3: Creating storage link...
call php artisan storage:link
echo.

echo Step 4: Seeding default settings...
call php artisan db:seed --class=SettingSeeder
echo.

echo Step 5: Clearing cache...
call php artisan cache:clear
call php artisan config:clear
call php artisan view:clear
echo.

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo You can now:
echo 1. Access admin panel at /admin
echo 2. Click "Website Settings" to configure
echo 3. Upload logos and set colors
echo.
pause
