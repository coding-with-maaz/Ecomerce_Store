# Medzfitt - Quick Installation Guide

## Prerequisites

Before you begin, ensure you have:
- PHP 8.2 or higher
- Composer
- MySQL or MariaDB
- Node.js & NPM (optional, for asset compilation)

## Quick Start (5 Minutes)

### Step 1: Navigate to Project Directory
```bash
cd medzfitt-laravel
```

### Step 2: Install Composer Dependencies
```bash
composer install
```

### Step 3: Set Up Environment
```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Configure Database

Open `.env` file and update these lines:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medzfitt_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 5: Create Database

Create a database named `medzfitt_db` in MySQL:
```sql
CREATE DATABASE medzfitt_db;
```

Or use command line:
```bash
mysql -u root -p -e "CREATE DATABASE medzfitt_db;"
```

### Step 6: Run Migrations and Seeders
```bash
# Run all migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

This will create all tables and populate them with:
- Admin user account
- 7 Categories
- 5 Sample products with images and variants
- Site settings
- Store location

### Step 7: Create Storage Symlink
```bash
php artisan storage:link
```

### Step 8: Start Development Server
```bash
php artisan serve
```

## Access the Application

- **Frontend**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin

### Default Admin Credentials
```
Email: admin@medfit.com
Password: password
```

⚠️ **IMPORTANT**: Change the admin password immediately after first login!

## Troubleshooting

### Database Connection Error
- Verify MySQL is running
- Check database credentials in `.env`
- Ensure database exists

### Permission Errors
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Clear All Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Migration Issues
If migrations fail, you can reset and re-run:
```bash
php artisan migrate:fresh --seed
```
⚠️ Warning: This will delete all existing data!

## Next Steps

1. **Customize Settings**: Visit admin panel to update site settings
2. **Add Products**: Add your products via admin panel
3. **Upload Images**: Configure file upload settings
4. **Test Shopping Flow**: Test add to cart and checkout
5. **Configure Email**: Set up mail settings in `.env`

## Production Deployment

For production:

1. Update `.env`:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   ```

2. Optimize:
   ```bash
   composer install --optimize-autoloader --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. Set proper file permissions
4. Configure web server (Apache/Nginx)
5. Enable SSL certificate

## Support

If you encounter any issues:
- Check the main README.md for detailed documentation
- Review Laravel logs in `storage/logs/laravel.log`
- Contact: info.medzfitt@gmail.com

---

Happy coding! 🚀

