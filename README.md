# 🍽️ Kitchen Spurs CMS API

This is a Laravel 12-based CMS (Content Management System) API built for the Kitchen Spurs assignment. It includes session-based login (no tokens), role-based access, full CRUD for articles and categories, and AI-powered slug & summary generation using Gemini 1.5 Flash.

---

## 🚀 Quick Setup

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/kitchen-cms-api.git
cd kitchen-cms-api
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update the `.env` file with your DB and Gemini key:

```env
DB_DATABASE=kitchen_cms
DB_USERNAME=root
DB_PASSWORD=

GEMINI_API_KEY=your_gemini_api_key_here
```

### 4. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

Seeder creates:
- 👑 Admin: `admin@example.com` / `password`
- ✍️ Author: `author@example.com` / `password`

### 5. Serve the App

```bash
php artisan serve
```

Access at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔐 Authentication

- **POST** `/api/login`  
  Form-data:
  ```
  email=admin@example.com
  password=password
  ```
- **POST** `/api/logout`

Login sets session cookie (`laravel_session`) in Postman Desktop.

---

## 📄 Article Endpoints

| Method | Endpoint                               | Description                  |
|--------|----------------------------------------|------------------------------|
| GET    | `/api/articles`                        | List all articles            |
| POST   | `/api/articles`                        | Create a new article         |
| GET    | `/api/articles/{id}`                   | Get article by ID            |
| PUT    | `/api/articles/{id}`                   | Update article               |
| DELETE | `/api/articles/{id}`                   | Delete article               |
| POST   | `/api/articles/{id}/generate-slug`     | Generate slug via Gemini     |
| POST   | `/api/articles/{id}/generate-summary`  | Generate summary via Gemini  |

---

## 📂 Category Endpoints (Admin Only)

| Method | Endpoint                  | Description         |
|--------|---------------------------|---------------------|
| GET    | `/api/categories`         | List categories     |
| POST   | `/api/categories`         | Create category     |
| GET    | `/api/categories/{id}`    | View category       |
| PUT    | `/api/categories/{id}`    | Update category     |
| DELETE | `/api/categories/{id}`    | Delete category     |

---

## 🤖 Gemini AI (1.5 Flash)

Used to:
- Generate SEO-friendly slugs
- Summarize article content

Set your API key in `.env`:

```env
GEMINI_API_KEY=your_gemini_api_key_here
```

---

## 🧪 Testing with Postman

> Use **Postman Desktop App** (not browser) to preserve session cookies.

### Test Flow:
1. Login (`/api/login`)
2. Create or update article
3. Call `/generate-slug` or `/generate-summary`
4. Call logout

Import the provided `postman_collection.json` to run tests quickly.

---

## 🛠️ Dev Helpers

```bash
php artisan optimize:clear
php artisan migrate:fresh --seed
```

---

## 👤 User Roles

| Role   | Permissions                           |
|--------|----------------------------------------|
| Admin  | Manage all articles & categories       |
| Author | Manage only their own articles         |

---

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   ├── AuthController.php
│   ├── ArticleController.php
│   └── CategoryController.php
├── Http/Middleware/IsAdmin.php
├── Jobs/
│   ├── GenerateArticleSlugJob.php
│   └── GenerateArticleSummaryJob.php
├── Services/
│   └── GeminiService.php
routes/
└── api.php
```

---

## 📬 Contact

Made for Kitchen Spurs assignment.  
For any questions: `your.email@example.com`
