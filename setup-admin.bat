@echo off
echo ========================================
echo Admin Panel Setup
echo ========================================
echo.

echo Running migrations...
call php artisan migrate
echo.

echo Seeding database...
call php artisan db:seed
echo.

echo Creating storage link...
call php artisan storage:link
echo.

echo Clearing cache...
call php artisan cache:clear
call php artisan config:clear
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
