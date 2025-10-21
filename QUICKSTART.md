# 🚀 Medzfitt - Quick Start Guide

Get your e-commerce store running in 5 minutes!

## Option 1: Automated Installation (Windows)

```bash
# Run the installer script
install.bat
```

## Option 2: Automated Installation (Linux/Mac)

```bash
# Make script executable
chmod +x install.sh

# Run the installer
./install.sh
```

## Option 3: Manual Installation

```bash
# 1. Install dependencies
composer install

# 2. Setup environment
cp .env.example .env
php artisan key:generate

# 3. Configure database in .env
# Edit .env file and set:
# DB_DATABASE=medzfitt_db
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# 4. Create database
mysql -u root -p -e "CREATE DATABASE medzfitt_db;"

# 5. Run migrations and seeders
php artisan migrate
php artisan db:seed

# 6. Create storage symlink
php artisan storage:link

# 7. Start server
php artisan serve
```

## 📍 Access Points

- **Website**: http://localhost:8000
- **Admin Panel**: http://localhost:8000/admin

## 🔑 Admin Login

```
Email: admin@medfit.com
Password: password
```

⚠️ **Change this password immediately after first login!**

## 📋 Sample Data Included

The database seeders provide:
- ✅ 1 Admin user
- ✅ 7 Product categories
- ✅ 5 Sample products
- ✅ Product images and variants
- ✅ Site settings
- ✅ Store location

## 🎯 What You Can Do Now

### As Admin:
1. Login to admin panel
2. View dashboard statistics
3. Manage products (add, edit, delete)
4. Manage categories
5. Process orders
6. Update site settings

### As Customer:
1. Browse products
2. Search and filter
3. View product details
4. Add items to cart
5. Complete checkout
6. Track orders

## 🛠️ Common Commands

```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed

# Reset database (WARNING: deletes all data)
php artisan migrate:fresh --seed

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Create new admin user
php artisan tinker
>>> User::create(['name' => 'New Admin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'role' => 'admin']);
```

## 📂 Key Files to Know

```
Routes:
- routes/web.php       → Frontend and admin routes
- routes/api.php       → API endpoints

Controllers:
- app/Http/Controllers/ProductController.php
- app/Http/Controllers/CartController.php
- app/Http/Controllers/OrderController.php
- app/Http/Controllers/Admin/*

Models:
- app/Models/Product.php
- app/Models/Category.php
- app/Models/Order.php
- app/Models/Cart.php

Views:
- resources/views/home.blade.php
- resources/views/products/
- resources/views/cart/
- resources/views/admin/

Database:
- database/migrations/
- database/seeders/
```

## 🎨 Customize Your Store

### 1. Update Site Information
```bash
# Edit settings in admin panel or database
php artisan tinker
>>> App\Models\Setting::set('site_name', 'Your Store Name');
>>> App\Models\Setting::set('contact_email', 'your@email.com');
```

### 2. Change Colors
Edit `resources/views/layouts/app.blade.php` and customize Tailwind CSS classes

### 3. Add Products
1. Go to Admin → Products → Add New Product
2. Fill in product details
3. Upload images
4. Add variants (colors, sizes)
5. Publish

## 🔧 Troubleshooting

### Can't connect to database?
```bash
# Check MySQL is running
# Verify credentials in .env
# Test connection:
mysql -u your_username -p
```

### 500 Error?
```bash
# Clear all cache
php artisan config:clear
php artisan cache:clear

# Check storage permissions
chmod -R 775 storage bootstrap/cache
```

### Routes not working?
```bash
# Clear route cache
php artisan route:clear

# List all routes
php artisan route:list
```

### Migration errors?
```bash
# Start fresh (WARNING: deletes data)
php artisan migrate:fresh --seed
```

## 📞 Need Help?

1. Check **README.md** for detailed documentation
2. See **FEATURES.md** for complete feature list
3. Read **INSTALLATION.md** for setup details
4. Contact: info.medzfitt@gmail.com

## 🎉 You're Ready!

Your e-commerce store is now live and ready to accept orders!

### Next Steps:
1. ✅ Change admin password
2. ✅ Update site settings
3. ✅ Add your products
4. ✅ Customize design
5. ✅ Test checkout process
6. ✅ Go live!

---

**Happy Selling! 🛍️**

