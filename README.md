# 📋 To-do App (PHP, MySQL & Bootstrap)

A simple and effective **To-do application** built with **pure PHP** using the **MVC (Model-View-Controller)** architecture, **MySQL** database for data persistence, and **Bootstrap 5** for a modern, responsive UI.

---

## 🛠️ Technologies Used

- PHP (MVC architectural pattern)
- MySQL for database management
- Bootstrap 5 for responsive
- HTML, CSS, JavaScript (optional)

---

## ⚙️ Features

- ✅ Add users/tasks (Create)
- ✅ Delete users/tasks (Delete)
- ✅ Search functionality to find users/tasks
- ✅ Clean MVC structure for better maintainability
- ✅ Responsive UI powered by Bootstrap
- ✅ Form validation and user feedback with Bootstrap components

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/Gmuza3/Todo-Php.git
cd TO-DO-APP
```

---

### 2️⃣ Set Up `.env` File

Create a `.env` file in the root of your project:

```
APP_HOST=localhost
APP_PORT=3306
APP_DBNAME=to-do
APP_NAME=root
APP_PASS=''

```

---

### 3️⃣ Install Composer Dependencies

```bash
composer install
```

---

### 4️⃣ Create Database & Import Schema

1. Open your browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Create a new database named `users`
3. Import the SQL file located in `db/to-do.sql`

OR via CLI:

```bash
mysql -u root -p booking < db/to-do.sql
```

---

### 5️⃣ Start PHP Server

```bash
php -S localhost:8000 -t public
```

Then open: [http://localhost:8000/users](http://localhost:8000/users)