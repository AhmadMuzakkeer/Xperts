# Xperts - Laravel Mini CRM

A Laravel-based application for managing **Companies** and **Employees** with authentication, CRUD functionality, API endpoints, and database relationships.

---

# 🚀 How to Run the Project

### 1. Install Dependencies

```
composer install
```

### 2. Setup Environment File

```
cp .env.example .env
php artisan key:generate
```

---

### 3. Configure Database (MySQL recommended)

Open `.env` and update the DB section:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Run Database Migration

This will create all required tables.

```
php artisan migrate
```

---

## ✅ Implemented Features

### Authentication

Basic Laravel authentication implemented for admin login.

* [x] Admin authentication
* [x] Registration disabled

---

### Database Seeds

Create initial admin credentials:

```
php artisan db:seed
```

Admin login:

Email: [admin@admin.com](mailto:admin@admin.com)
Password: password

* [x] Admin user seeded successfully

---

### Optional Demo Data

Seed sample companies and employees:

```
php artisan db:seed --class=CompanySeeder
php artisan db:seed --class=EmployeeSeeder
```

This will:

* Create **20 companies**
* Create **5–12 employees for each company**

Note: Logos are not included in seeded companies.

---

### Install Frontend Dependencies

```
npm install
npm run dev
```

---

### Start the Server

```
php artisan serve
```

---

# 📦 Implemented System Requirements

### CRUD Functionality

* [x] Create / Read / Update / Delete Companies
* [x] Create / Read / Update / Delete Employees

---

### Companies Table

Fields implemented:

* [x] Name (required)
* [x] Email
* [x] Logo (minimum 100x100)
* [x] Website

---

### Employees Table

Fields implemented:

* [x] First Name (required)
* [x] Last Name (required)
* [x] Company (Foreign Key)
* [x] Email
* [x] Phone

---

### Laravel Architecture

* [x] Database migrations
* [x] Eloquent relationships
* [x] Resource controllers
* [x] Form request validation
* [x] Pagination (10 records per page)

---

### Storage Setup

Run this command to allow logo access from public directory:

```
php artisan storage:link
```

* [x] Company logos stored in `storage/app/public`

---

### Routing

* [x] Web routes implemented
* [x] API routes implemented

---

# 🔗 API Endpoints

Fetch all companies:

```
http://127.0.0.1:8000/api/v1/companies
```

Fetch a single company with employees:

```
http://127.0.0.1:8000/api/v1/companies/1
```

Response includes:

* Company details
* List of employees
* `employee_count` attribute

---

### Example API Response

```
{
  "id": 1,
  "name": "Company Name",
  "email": "company@email.com",
  "website": "https://company.com",
  "employee_count": 8,
  "employees": [...]
}
```

---

# 🧪 API Testing

* [x] Tested using Postman

---

# 👨‍💻 Author

Developed by **Ahmad Muzakkeer**
