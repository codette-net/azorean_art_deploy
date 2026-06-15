
# Laravel 12 Preview Deploy (Hostinger Shared Hosting)

This document describes a reliable way to deploy a preview version of a Laravel 12 project to Hostinger shared hosting where the document root cannot be changed.

Goal:
Create a public preview environment at:
https://preview.yourdomain.tld

This method keeps Laravel's normal /public structure and uses .htaccess forwarding.

---

## 1. Create subdomain

In hPanel → Domains → Subdomains

Create:
preview.yourdomain.tld

It will point to:
/public_html/preview

Do NOT try to remove /public from Laravel. Keep normal structure.

---

## 2. Upload project via Git

Deploy repository into:

/public_html/preview

The folder must contain:
app/
bootstrap/
config/
routes/
storage/
vendor/
public/

---

## 3. Install dependencies

SSH or terminal:

cd ~/public_html/preview
composer install --no-dev --optimize-autoloader

---

## 4. Environment configuration

Create .env in /preview

APP_ENV=production
APP_DEBUG=true
APP_URL=https://preview.yourdomain.tld

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=preview_db
DB_USERNAME=preview_user
DB_PASSWORD=password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
FILESYSTEM_DISK=public

Generate key:

php artisan key:generate

---

## 5. Database

php artisan migrate

---

## 6. Build frontend assets locally

On local machine:

npm run build

Commit & push:

public/build
public/images (if static assets exist)

---

## 7. Important: Do NOT move Laravel public folder

Structure must remain:

preview/public/index.php
preview/public/build/manifest.json

Laravel 12 expects public_path() to exist.

---

## 8. Root forwarding (.htaccess workaround)

Hostinger cannot change document root.
We forward /preview → /preview/public

Create:

/public_html/preview/.htaccess

Content:

RewriteEngine On

RewriteCond %{DOCUMENT_ROOT}/public%{REQUEST_URI} -f [OR]
RewriteCond %{DOCUMENT_ROOT}/public%{REQUEST_URI} -d
RewriteRule ^(.*)$ public/$1 [L]

RewriteRule ^ public/index.php [L]

---

## 9. Laravel public .htaccess

File:
/public_html/preview/public/.htaccess

<IfModule mod_rewrite.c>
    RewriteEngine On

    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f

    RewriteRule ^ index.php [L]
</IfModule>

---

## 10. Clear caches

php artisan optimize:clear

---

## 11. Verify

These must work:

/build/manifest.json
/images/example.jpg
/

If manifest works → Vite works → site ready

---

## Notes

Laravel 12 no longer supports easy public path overrides.
Always keep /public folder intact.
Shared hosting requires rewrite forwarding instead of moving index.php.

This setup is stable and repeatable for preview deployments.
