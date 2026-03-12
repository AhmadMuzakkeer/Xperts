# Xperts - Laravel 

# How to run the project

1. Composer install
2. cp .env.example .env
3. php artisan key:generate

4. create database (preferred mysql)
    
    -go to .env
    -find db section

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=(Your db name )
    DB_USERNAME=root
    DB_PASSWORD=


5. php artisan migrate --> this will create all necessary table 


### Basic Laravel Authentication: Allows administrators to log in. [✅]


6. php artisan db:seed --> only seed admin creds 

    -email = admin@admin.com
    -pass = password

    ### Database Seeds: Utilize database seeds to create the initial user with the email admin@admin.com and the password  "password." [✅]

7.  📌only run this if want to seed 20 company info and employee without logo

    php artisan db:seed --class=CompanySeeder  --> will seed 20 company info 
    php artisan db:seed --class=EmployeeSeeder --> will seed 5-12 employees for each company

8.   npm install 
9.   npm run dev
10.  php artisan serve

### CRUD Functionality: Implement Create / Read / Update / Delete operations for two main menu items: Companies and Employees[✅]

### Companies Database Table: Includes fields such as Name (required), email, logo (minimum 100x100), and website [✅]

### Employees Database Table: Includes fields like First Name (required), Last Name (required), Company (foreign key linking to Companies), email, and phone [✅]

### Database Migrations: Use database migrations to create the specified schemas and use Eloquent models to define relationships between data tables [✅]

### Validation and Pagination: Implement Laravel's validation functions using Request classes. Utilize Laravel's pagination feature to display lists of Companies and Employees with 10 entries per page. [✅]

### Resource Controllers: Employ basic Laravel resource controllers with default methods (index, create, store, etc.). [✅]

### Authentication and Theme: Use Laravel's starter kit for authentication and basic themes; However, disable the registration functionality. [✅]

### API and Web Routes: Make use of both API and web routes. [✅]



11.  php artisan storage:link

### Logo Storage: Store company logos in the storage/app/public folder and ensure accessibility from the public domain. [✅]


### Testing: Ensure that the API can be tested using Postman or any other preferred alternatives. [✅]

http://127.0.0.1:8000/api/v1/companies --> to fetch all company data
http://127.0.0.1:8000/api/v1/companies/1 --> to fetch single company with list of employee. 'employee count' show as an attribute

### API Response: Create an API endpoint that returns a single company with a list of employees. Include the 'employee_count' as an attribute in the API response model. [✅]



## 📌 Author

Developed by **Ahmad Muzakkeer**






