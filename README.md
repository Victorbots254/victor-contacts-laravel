Contacts Management Application

1. This repository contains my submission for the Codility assessment task. The goal of this project was to build a Contacts Management Application using Laravel with support for CRUD operations, grouping, and a RESTful API.

I chose to implement both:

Backend (Laravel) with full API support.

Frontend (Laravel Blade templates) for simple user interaction.

2. 🚀 Features Implemented

✅ Full CRUD operations for Contacts.

✅ Ability to create and manage Groups.

✅ Association of contacts with one or multiple groups.

✅ RESTful API endpoints for contacts and groups.

✅ Laravel Blade templates for user-facing UI.

✅ Database factories & seeders for test data.

✅ PHPUnit tests covering API and basic feature functionality.

3. ⚙️ Project Setup
1. Clone the repository
git clone https://github.com/your-username/victor-contacts.git
cd victor-contacts

2. Install dependencies
composer install
npm install && npm run dev

3. Configure environment

Copy .env.example to .env and set database credentials:

cp .env.example .env


Edit:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=contacts_db
DB_USERNAME=root
DB_PASSWORD=

4. Run migrations & seeders
php artisan migrate --seed

5. Run development server
php artisan serve

App will be available at http://127.0.0.1:8000


4. 📂 Database Schema

We designed two tables:

contacts → stores contact details (first name, last name, email).

groups → stores groups (friends, family, work, etc.).

contact_group → pivot table for many-to-many relationship.

5. 🌐 API Endpoints
Method	Endpoint	Description
GET	/api/contacts	List all contacts
POST	/api/contacts	Create new contact
GET	/api/contacts/{id}	Get single contact
PUT	/api/contacts/{id}	Update contact
DELETE	/api/contacts/{id}	Delete contact
GET	/api/groups	List all groups
POST	/api/groups	Create new group

6. 🖼️ Snapshots

### Creating relevant files
![migration](assets/images/creating relevant files.png)

### Migration
![contact list](assets/images/doing migration.png)

### Launching
![api test](assets/images/launching or opening browser.png)

### Dashboard
![tests](assets/images/dasbhoard.png)


### Artisan Test
![migration](assets/images/artisan test.png)

### Groups page
![contact list](assets/images/Group Page.png)



7. 🧪 Tests

We wrote both Unit and Feature tests.

Run all tests:

php artisan test

✅ Test Results

Out of the suite, the following 6 tests passed successfully:

Tests\Unit\ExampleTest::test_that_true_is_true

Tests\Feature\ContactApiTest::test_create_contact

Tests\Feature\ContactApiTest::test_update_contact

Tests\Feature\ContactApiTest::test_delete_contact

Tests\Feature\ContactApiTest::test_list_contacts

Tests\Feature\ExampleTest::test_the_application_returns_a_successful_response


8. 📝 Assessment Checklist

 Effective use of Eloquent ORM for CRUD operations.

 Validation and error handling.

 Organized code structure (Controllers, Models, Factories).

 Proper API routing (routes/api.php).

 RESTful endpoints for Contacts & Groups.

 Blade UI for user-facing CRUD.

 Comprehensive tests validating endpoints and application flow.


9. 👨‍💻 Author

Developed by Victor as part of the Codility assessment.