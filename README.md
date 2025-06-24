## 🔧 How to Set Up and Run the Project Locally

This guide will help you run the Laravel project for the Einterio Designer Dashboard on your local machine.

---

### ✅ Requirements

- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL or compatible database
- Git (optional, for cloning)

---

### 📦 1. Clone the Repository

```bash
git clone https://github.com/yourusername/einterio-dashboard.git
cd einterio-dashboard
```

> Or download and extract the ZIP folder if shared manually.

---

### ⚙️ 2. Install PHP Dependencies

```bash
composer install
```

---

### 🎨 3. Install Frontend Assets

```bash
npm install
npm run build
```

> Use `npm run dev` if you're developing locally.

---

### 🔑 4. Set Up Environment File

```bash
cp .env.example .env
php artisan key:generate
```

Then update your `.env` file with your DB credentials and API key:

```
DB_DATABASE=einterio
DB_USERNAME=root
DB_PASSWORD=your_password

OPENWEATHER_API_KEY=your_openweather_api_key
```

---

### 🗃 5. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

> This creates the required tables and inserts demo data (designer user, room pack, etc.)

---

### 📁 6. Create Storage Symlink (for uploaded files)

```bash
php artisan storage:link
```

---

### 🌐 7. Serve the Application

```bash
php artisan serve
```

Then open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

### 🧪 Demo Login Credentials

```
Email: designer@demo.com
Password: password
```

---

### 📌 Notes

- The weather data on the dashboard is dynamic based on the user's city.
- You can change the city by editing the user's profile (if needed).
- All uploads (images, PDFs, CSV) are stored in `storage/app/public`, and served via `public/storage`.

---

That's it! Let me know if you have any issues running it.

