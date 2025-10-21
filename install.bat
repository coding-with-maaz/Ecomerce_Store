@echo off
echo ========================================
echo Medzfitt Laravel E-commerce Installer
echo ========================================
echo.

REM Check if composer is installed
where composer >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: Composer is not installed!
    echo Please install Composer from https://getcomposer.org/
    pause
    exit /b 1
)

REM Check if PHP is installed
where php >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: PHP is not installed!
    echo Please install PHP 8.2 or higher
    pause
    exit /b 1
)

echo [1/7] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 (
    echo ERROR: Failed to install dependencies
    pause
    exit /b 1
)

echo.
echo [2/7] Setting up environment file...
if not exist .env (
    copy .env.example .env
    echo .env file created
) else (
    echo .env file already exists
)

echo.
echo [3/7] Generating application key...
php artisan key:generate

echo.
echo ========================================
echo Database Configuration Required
echo ========================================
echo.
echo Please edit the .env file and configure your database:
echo - DB_DATABASE=medzfitt_db
echo - DB_USERNAME=your_username
echo - DB_PASSWORD=your_password
echo.
set /p continue="Press Enter after updating .env file..."

echo.
echo [4/7] Running database migrations...
php artisan migrate
if %errorlevel% neq 0 (
    echo ERROR: Migration failed. Please check your database configuration.
    pause
    exit /b 1
)

echo.
echo [5/7] Seeding database with sample data...
php artisan db:seed

echo.
echo [6/7] Creating storage symlink...
php artisan storage:link

echo.
echo [7/7] Clearing cache...
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo.
echo ========================================
echo Installation Complete!
echo ========================================
echo.
echo Your application is ready to use!
echo.
echo Default Admin Credentials:
echo Email: admin@medfit.com
echo Password: password
echo.
echo To start the development server, run:
echo php artisan serve
echo.
echo Then visit: http://localhost:8000
echo Admin Panel: http://localhost:8000/admin
echo.
echo IMPORTANT: Change the admin password after first login!
echo.
pause

