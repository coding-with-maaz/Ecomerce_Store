# Medzfitt E-commerce Platform

A complete Laravel-based e-commerce platform for medical wear and scrubs, built for healthcare professionals.

## 🎯 Features

- **Product Management**: Full CRUD operations for products with variants, images, and videos
- **Category System**: Organized product categories with custom sorting
- **Shopping Cart**: Guest and authenticated user shopping cart functionality
- **Order Management**: Complete order processing with multiple status tracking
- **User Authentication**: Customer and admin role-based access control
- **Product Variants**: Support for colors, sizes, and custom variants
- **Review System**: Customer product reviews and ratings
- **Admin Dashboard**: Comprehensive admin panel for managing the store
- **API Support**: RESTful API for mobile/third-party integrations
- **Settings Management**: Configurable site settings and store locations
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL >= 5.7 or MariaDB >= 10.3
- Node.js & NPM (for asset compilation)

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd medzfitt-laravel
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   
   Update your `.env` file with database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=medzfitt_db
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Create storage symlink**
   ```bash
   php artisan storage:link
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

   Visit: `http://localhost:8000`

## 👤 Default Credentials

- **Admin Access**
  - Email: `admin@medfit.com`
  - Password: `password` (Change this after first login!)

## 📁 Project Structure

```
medzfitt-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Application controllers
│   │   │   ├── Admin/           # Admin panel controllers
│   │   │   ├── CartController.php
│   │   │   ├── OrderController.php
│   │   │   └── ProductController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/                   # Eloquent models
│       ├── User.php
│       ├── Product.php
│       ├── Category.php
│       ├── Order.php
│       ├── Cart.php
│       └── ...
├── database/
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Database seeders
├── resources/
│   └── views/                    # Blade templates
│       ├── layouts/
│       ├── products/
│       ├── cart/
│       ├── orders/
│       └── admin/
├── routes/
│   ├── web.php                   # Web routes
│   └── api.php                   # API routes
└── public/                       # Public assets
```

## 🗄️ Database Schema

### Main Tables

1. **users** - User accounts (customers and admins)
2. **categories** - Product categories
3. **products** - Product catalog
4. **product_images** - Product images
5. **product_variants** - Product variations (colors, sizes)
6. **cart** - Shopping cart items
7. **orders** - Customer orders
8. **order_items** - Items in each order
9. **reviews** - Product reviews
10. **settings** - Site configuration
11. **store_locations** - Physical store locations

## 🔌 API Endpoints

### Public Endpoints

```
GET  /api/v1/products              - List all products
GET  /api/v1/products/{slug}       - Get product details
GET  /api/v1/categories            - List all categories
GET  /api/v1/categories/{slug}     - Get category details
```

### Protected Endpoints (Requires Authentication)

```
GET  /api/v1/orders                - List user orders
GET  /api/v1/orders/{order}        - Get order details
```

## 🎨 Frontend Routes

```
GET  /                             - Homepage
GET  /products                     - Product listing
GET  /products/{slug}              - Product details
GET  /products/category/{slug}     - Category products
GET  /products/search              - Search products
GET  /cart                         - Shopping cart
POST /cart/add/{product}           - Add to cart
GET  /orders                       - User orders (auth)
GET  /orders/checkout              - Checkout page (auth)
```

## 🔐 Admin Routes

```
GET  /admin                        - Admin dashboard
GET  /admin/products               - Manage products
GET  /admin/categories             - Manage categories
GET  /admin/orders                 - Manage orders
```

## 💻 Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📦 Key Packages Used

- Laravel Framework 12.x
- Tailwind CSS (via CDN for simplicity)
- Laravel Sanctum (for API authentication)

## 🎯 Models & Relationships

### Product Model
- `belongsTo` Category
- `hasMany` ProductImage
- `hasMany` ProductVariant
- `hasMany` Review
- `hasMany` OrderItem
- `hasMany` Cart

### Order Model
- `belongsTo` User
- `hasMany` OrderItem

### Category Model
- `hasMany` Product

### User Model
- `hasMany` Order
- `hasMany` Cart
- `hasMany` Review

## 🛠️ Customization

### Adding New Settings
```php
use App\Models\Setting;

Setting::set('key', 'value');
$value = Setting::get('key', 'default');
```

### Adding Product Variants
```php
$product->variants()->create([
    'variant_name' => 'color',
    'variant_value' => 'Blue',
    'price_adjustment' => 0,
    'stock_quantity' => 10,
]);
```

## 📝 Important Notes

1. **File Uploads**: Product images and videos are stored in the `public` directory. Make sure to configure proper storage if deploying to production.

2. **Security**: Change default admin password immediately after installation.

3. **Environment**: Never commit `.env` file to version control.

4. **Production**: Set `APP_DEBUG=false` and `APP_ENV=production` in production environments.

5. **Database**: The SQL dump includes sample data from the original database. You can customize seeders to modify initial data.

## 🚢 Deployment

For production deployment:

1. Set proper environment variables
2. Run `composer install --optimize-autoloader --no-dev`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Set proper file permissions for `storage` and `bootstrap/cache`
7. Configure your web server (Apache/Nginx)

## 📞 Support & Contact

- **Email**: info.medzfitt@gmail.com
- **Phone**: 03281662433
- **Address**: Sikandri Plaza, Park Rd, Chatta Bakhtawar, Islamabad, 45500

## 📄 License

This project is proprietary software developed for Medzfitt.

## 🙏 Acknowledgments

Built with Laravel - The PHP Framework for Web Artisans

---

**Version**: 1.0.0  
**Last Updated**: October 2025
