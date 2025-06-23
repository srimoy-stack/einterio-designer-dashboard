# 🎨 Einterio Designer Dashboard (Assignment Project)

This Laravel-based project was built as part of a PHP Developer assignment. The goal was to create a designer dashboard for an AI-powered interior design platform where designers can log in, upload room packs, and track their work and payments. This README covers the setup, features, and implementation decisions in a simple, professional tone.

---

## 📌 Project Summary

- Laravel 9 project using Laravel Breeze for authentication
- Tailwind CSS used for the frontend layout
- Role-based dashboard for designers only
- Upload feature for Room Packs (with cover, renders, PDF, chart)
- Dynamic dashboard showing rooms, hours, revisions, and payments
- Weather integration using OpenWeatherMap API
- Seeded demo data for a ready-to-test experience

---

## 👤 Demo User Login

This demo user is seeded using Laravel’s seeder.

Email: designer@demo.com
Password: password

Once logged in, the designer is redirected to their dashboard.

---

## ⚙️ Features Implemented

### ✅ 1. Authentication and Roles

- Laravel Breeze is used for login and registration
- A `role` field is added to the `users` table
- Routes are protected using middleware so only `designer`-role users can access upload and dashboard routes

---

### ✅ 2. Room Pack Upload

Designers can upload a "room pack" that includes:

| Field                        | Type           | Required | Notes                                     |
|-----------------------------|----------------|----------|-------------------------------------------|
| Title                       | Text           | ✅        | Name of the pack                          |
| Cover Render                | Image          | ✅        | Main image of the design                  |
| Optional Renders            | Images (max 3) | ❌        | Up to 3 additional images                 |
| PDF Drawing                 | PDF            | ✅        | 2D technical drawing                      |
| Decor/Material Chart File   | CSV            | ❌        | Can either upload this...                 |
| Decor/Material Chart Link   | URL            | ❌        | ...or provide a link instead              |

- Files are stored in `/storage/app/room_packs/`
- Server-side validation handles all constraints
- Uploads are associated with the logged-in designer

---

### ✅ 3. Designer Dashboard

The dashboard shows:

- **📦 Rooms Assigned** – Number of room packs uploaded
- **⏱️ Hours Worked** – Based on `time_logs` table
- **🔁 Revisions Made** – Pulled from `revisions` table
- **💰 Payments Received** – From the `payments` table, where status is `paid`

These metrics are dynamically calculated per designer.

---

### ✅ 4. Weather API Integration (Bonus)

- Integrated using OpenWeatherMap's free API
- Pulls weather info based on the designer’s city
- A simple design tip is shown based on the weather condition (e.g., for "Clear", show a lighting tip)
- City is stored in the user’s profile and editable

---

### ✅ 5. Seeder for Demo Data

A Laravel seeder (`DesignerStatsSeeder`) is included to populate the following:

- Designer user
- One sample room pack
- Hours worked (via `time_logs`)
- A revision entry
- A paid payment

After migration, run:

```bash
php artisan db:seed
🛠️ Setup Instructions
Clone the project

bash
Copy
Edit
git clone https://github.com/your-username/einterio-designer-dashboard.git
cd einterio-designer-dashboard
Install dependencies

bash
Copy
Edit
composer install
npm install && npm run build
Configure environment

bash
Copy
Edit
cp .env.example .env
php artisan key:generate
Update .env with your database and OpenWeatherMap API key

env
Copy
Edit
DB_DATABASE=einterio
DB_USERNAME=root
DB_PASSWORD=

OPENWEATHER_API_KEY=your_openweathermap_key_here
Run migrations and seed demo data

bash
Copy
Edit
php artisan migrate --seed
Serve the application

bash
Copy
Edit
php artisan serve
