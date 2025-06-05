# Multi-User Admin Dashboard (Laravel Blade UI)


A complete **multi-user dashboard system** built with Laravel and Blade UI.  
The system includes user registration and login, with admin approval required before granting access. Once approved, users can access their designated dashboard based on their roles.

---

## 🌟 Features

- 🔐 User Authentication (Login/Register) using Laravel UI (Blade)
- 🛑 Account approval system (users stay pending until approved by admin)
- 🧑‍💼 Role-based user management
- ✅ Admin Dashboard to review and approve users
- 📄 Fully designed frontend using Blade templates
- ⚙️ Clean architecture and MVC structure

---

## 📸 Screenshots (optional)
_Add screenshots of login page, pending approval screen, dashboard, etc._

---

## 🚀 Installation

```bash
# 1. Clone the project
git clone https://github.com/Amany359/<your-repo>.git

# 2. Go into the project directory
cd <your-repo>

# 3. Install composer dependencies
composer install

# 4. Copy .env and configure database
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Serve the application
php artisan serve
