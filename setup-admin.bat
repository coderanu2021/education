@echo off
echo ========================================
echo Admin Panel Setup
echo ========================================
echo.

echo Step 1: Dumping autoload...
call composer dump-autoload
echo.

echo Step 2: Clearing cache...
call php artisan config:clear
call php artisan cache:clear
call php artisan view:clear
echo.

echo Step 3: Running migrations...
call php artisan migrate
echo.

echo Step 4: Seeding database...
call php artisan db:seed
echo.

echo Step 5: Creating storage link...
call php artisan storage:link
echo.

echo Step 6: Final cache clear...
call php artisan cache:clear
call php artisan config:clear
call php artisan view:clear
echo.

echo ========================================
echo Setup Complete!
echo ========================================
echo.
echo Default Admin Credentials:
echo Email: admin@admin.com
echo Password: password
echo.
echo Admin Panel: http://localhost:8000/admin
echo.
echo IMPORTANT: Change password after first login!
echo.
echo You can also create a custom admin user:
echo php artisan admin:create
echo.
pause
