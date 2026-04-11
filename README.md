# Gaming Management App

A modern **full-stack gaming management application** consisting of a **RESTful API** and a **Single Page Application (SPA)** frontend.

The backend is fully implemented using Laravel, and the frontend is fully implemented using **Vue** as a SPA.

---

# 🧩 Architecture Overview

This project is structured as a **decoupled application**:

- **Backend (API)**  
  RESTful API for managing game resources (CRUD operations)

- **Frontend (SPA)**  
    A Vue Single Page Application that consumes the API

---

# 🚧 Project Status

- ✅ Backend API: **Completed & functional**
- 🚧 Frontend (Vue SPA): **Completed & functional**

---

# ⚙️ Tech Stack

## Backend
- **PHP 8.2+**
- **Laravel**
- **MariaDB**

## DevOps
- **Docker**
- **Docker Compose**

## Frontend
- **Vue**
- **Pinia**
- **Axios**
- **Tailwind (DaisyUI)**

---

# 📦 Features (Current)

- RESTful API
- Full CRUD for game resources
- Database seeding with demo data
- Fully functional Vue SPA frontend
- Dockerized development environment

---

# 🖥️ Requirements

Make sure you have installed:

- Docker
- Docker Compose
- Git

---

# Installation

## Create environment file

Copy the example environment configuration.

```bash
cp .env.example .env
```

Adjust environment variables if necessary.

---

## Create database root password file

```bash
echo "secret" > mariadb-root-pw.txt
```

---

## Build and start containers

```bash
docker compose up --build -d
```

This will start:

* Vue (Frontend)
* PHP (Laravel API)
* MariaDB database
---

## Run database migrations and seeders

```bash
docker compose exec backend php artisan migrate:fresh --seed
```