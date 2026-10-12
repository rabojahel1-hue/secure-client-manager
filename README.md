# 🛡️ Secure Client Manager

A secure web application built with **Laravel** for client and request management. This project focuses on implementing structured backend logic, role-based database interactions, and secure data handling.

---

### 🚀 Features & Functionality
- **Client Request Lifecycle:** Full CRUD operations for creating, updating, and tracking client requests.
- **Trash & Soft Deletes:** Implementation of a dedicated tracking system for deleted requests via a custom migration setup.
- **Database Architecture:** Structured migrations for users, cache logs, client requests, and deleted requests data.
- **Security-First Approach:** Input validation, protection against common web vulnerabilities, and secure database interactions.

---

### 🛠️ Tech Stack
- **Framework:** Laravel 11.x (PHP)
- **Frontend:** Blade Templating, HTML5, CSS3, JavaScript
- **Database:** MySQL / MariaDB
- **Development Environment:** XAMPP

---

### 📂 Key Implementation Details
- **Custom Migrations:** Created `create_deleted_client_requests_table` for automated historical log tracking.
- **Models & Relationships:** Set up the `DeletedClientRequest` model to handle relational data integrity.

---

### 💻 How to Run Locally

1. Clone the repository:
   ```bash
   git clone https://github.com
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Setup environmental variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Start the development server:
   ```bash
   php artisan serve
   ```
