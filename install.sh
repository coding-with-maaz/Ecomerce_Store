#!/bin/bash

echo "========================================"
echo "Medzfitt Laravel E-commerce Installer"
echo "========================================"
echo ""

# Colors for output
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo -e "${RED}ERROR: Composer is not installed!${NC}"
    echo "Please install Composer from https://getcomposer.org/"
    exit 1
fi

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo -e "${RED}ERROR: PHP is not installed!${NC}"
    echo "Please install PHP 8.2 or higher"
    exit 1
fi

echo -e "${GREEN}[1/7] Installing Composer dependencies...${NC}"
composer install
if [ $? -ne 0 ]; then
    echo -e "${RED}ERROR: Failed to install dependencies${NC}"
    exit 1
fi

echo ""
echo -e "${GREEN}[2/7] Setting up environment file...${NC}"
if [ ! -f .env ]; then
    cp .env.example .env
    echo ".env file created"
else
    echo ".env file already exists"
fi

echo ""
echo -e "${GREEN}[3/7] Generating application key...${NC}"
php artisan key:generate

echo ""
echo "========================================"
echo "Database Configuration Required"
echo "========================================"
echo ""
echo "Please edit the .env file and configure your database:"
echo "- DB_DATABASE=medzfitt_db"
echo "- DB_USERNAME=your_username"
echo "- DB_PASSWORD=your_password"
echo ""
read -p "Press Enter after updating .env file..."

echo ""
echo -e "${GREEN}[4/7] Running database migrations...${NC}"
php artisan migrate
if [ $? -ne 0 ]; then
    echo -e "${RED}ERROR: Migration failed. Please check your database configuration.${NC}"
    exit 1
fi

echo ""
echo -e "${GREEN}[5/7] Seeding database with sample data...${NC}"
php artisan db:seed

echo ""
echo -e "${GREEN}[6/7] Creating storage symlink...${NC}"
php artisan storage:link

echo ""
echo -e "${GREEN}[7/7] Clearing cache...${NC}"
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo ""
echo "========================================"
echo -e "${GREEN}Installation Complete!${NC}"
echo "========================================"
echo ""
echo "Your application is ready to use!"
echo ""
echo -e "${YELLOW}Default Admin Credentials:${NC}"
echo "Email: admin@medfit.com"
echo "Password: password"
echo ""
echo "To start the development server, run:"
echo -e "${GREEN}php artisan serve${NC}"
echo ""
echo "Then visit: http://localhost:8000"
echo "Admin Panel: http://localhost:8000/admin"
echo ""
echo -e "${RED}IMPORTANT: Change the admin password after first login!${NC}"
echo ""

