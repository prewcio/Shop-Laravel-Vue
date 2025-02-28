# 🛍️ Shop-Laravel-Vue [ARCHIVED]

![Status](https://img.shields.io/badge/Status-Discontinued-red)
![JavaScript](https://img.shields.io/badge/JavaScript-80.2%25-yellow)
![CSS](https://img.shields.io/badge/CSS-12.8%25-blue)
![PHP](https://img.shields.io/badge/PHP-5.5%25-purple)
![Vue](https://img.shields.io/badge/Vue-1.2%25-42b883)
![Laravel](https://img.shields.io/badge/Laravel-8.x-red)

## ⚠️ Project Status

> **Note**: This project has been discontinued due to client withdrawal. The codebase remains as a reference for Laravel-Vue integration patterns and e-commerce implementation examples.

## 🌟 Overview

Shop-Laravel-Vue was designed as a modern e-commerce platform built with Laravel 8 and Vue.js 2. While development was halted, the project demonstrates the integration of Laravel's backend capabilities with Vue.js's reactive frontend framework to create a responsive and dynamic shopping experience.

## 🚀 Tech Stack

### Backend
- **Framework**: Laravel 8.x
- **PHP Version**: 7.3 or 8.0+
- **Authentication**: Laravel Sanctum
- **API**: RESTful API with Laravel CORS
- **Database**: MySQL/PostgreSQL support
- **Testing**: PHPUnit 9.5

### Frontend
- **Framework**: Vue.js 2.6
- **UI Framework**: Bootstrap 5.1
- **HTTP Client**: Axios
- **Build Tool**: Laravel Mix 6
- **CSS Preprocessor**: SASS
- **Asset Bundling**: Webpack (via Laravel Mix)

## 💡 Learning Resources

While this project is no longer actively maintained, it serves as a valuable reference for:

1. **Laravel-Vue Integration**
   - Modern SPA architecture
   - State management patterns
   - Component organization

2. **E-commerce Implementation**
   - Shopping cart logic
   - Product management
   - User authentication flow

3. **Development Patterns**
   - API design
   - Frontend-backend communication
   - Modern PHP practices

## 🛠️ Installation (For Reference)

```bash
# Clone the repository
git clone https://github.com/prewcio/Shop-Laravel-Vue.git

# Navigate to project directory
cd Shop-Laravel-Vue

# Install PHP dependencies
composer install

# Install NPM dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Compile assets
npm run dev
```

## 📁 Project Structure

```
├── app/                 # PHP application code
│   ├── Http/           # Controllers, Middleware
│   ├── Models/         # Eloquent models
│   └── Services/       # Business logic
├── resources/
│   ├── js/            # Vue components and logic
│   ├── sass/          # SCSS styles
│   └── views/         # Blade templates
├── routes/
│   ├── api.php        # API routes
│   └── web.php        # Web routes
└── tests/             # Testing suite
```

## 📝 API Documentation

The API was designed following RESTful conventions:

Example endpoints:
- `GET /api/products` - List all products
- `POST /api/cart` - Add item to cart
- `GET /api/orders` - List user orders

## 🔧 Development Stack Details

### Backend Features
- Laravel Sanctum for API authentication
- CORS protection
- Modern PHP 7.3+ features
- Comprehensive testing setup

### Frontend Features
- Vue.js components architecture
- Bootstrap 5 integration
- Hot module replacement
- SASS styling structure

## 👤 Author

**Prewcio**
- Website: [prewcio.dev](https://prewcio.dev)
- Email: [this.prewcio@gmail.com](mailto:this.prewcio@gmail.com)
- GitHub: [@prewcio](https://github.com/prewcio)

## 📚 Additional Notes

- Project discontinued as of early development phase
- Codebase maintained for reference purposes
- Dependencies may need updates if forking for new projects
- Consider modern alternatives for new implementations

## 📄 License

This project is MIT licensed. See the LICENSE file for details.

---

*Last Updated: 2025-02-28 22:32:11 UTC*  
*Built with Laravel & Vue.js*
*Status: Archived/Discontinued*
