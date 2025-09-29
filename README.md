# Victor Contacts Management App

## Project Summary
A Laravel-based Contacts Management Application with CRUD operations, contact grouping, and sample data seeding. Features include:
- Laravel Blade frontend
- API endpoints for CRUD
- Group assignment for contacts
- Sample seeded data
- Feature tests included

## Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js (if using Vue frontend)

## Installation Steps
1. Clone the repository:
   ```bash
   git clone git@github.com:YourUser/victor-contacts-laravel.git
   cd victor-contacts-laravel
2. Install PHP dependencies:

composer install


3. Copy environment file:

cp .env.example .env
php artisan key:generate


4. Configure .env for your DB

Database
php artisan migrate --seed

Run Server
php artisan serve

Testing
php artisan test

Frontend (if using Vue)
npm install
npm run dev

5. Postman collection or curl examples

Example Curl
curl -X POST http://localhost:8000/api/contacts \
-H "Content-Type: application/json" \
-d '{"first_name":"Victor","email":"v@example.com","group_ids":[1,2]}'


---

✅ Once you paste these files into your project, you can:

>>>Run migrations + seeders:  
```bash
php artisan migrate:fresh --seed


Run tests:

php artisan test


Push to GitHub with .env.example, migrations, seeders, tests, Blade templates, controllers, and README.