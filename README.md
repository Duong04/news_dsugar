# DSugar News

DSugar News is a Laravel-based news publishing platform designed for content browsing, article management, user authentication, commenting, and role-based administration.

The project can be used as a foundation for an online magazine, news portal, blog platform, or editorial content management system.

## Table of Contents

- [Overview](#overview)
- [Key Features](#key-features)
- [Screenshots](#screenshots)
- [Tech Stack](#tech-stack)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Running the Project](#running-the-project)
- [Project Structure](#project-structure)
- [Main Routes](#main-routes)
- [Testing](#testing)
- [Deployment Notes](#deployment-notes)
- [Author](#author)

## Overview

DSugar News provides a complete news website experience with a public-facing client interface and an admin panel for managing editorial content. Users can browse posts by category, search articles, view post details, register accounts, update profiles, create posts, and interact through comments.

Administrators can manage posts, categories, subcategories, users, roles, permissions, actions, comments, and post approval workflows.

## Key Features

### Public Website

- Browse latest, featured, trending, and category-based posts.
- View detailed article pages with author information, category context, and related content.
- Search posts by keyword.
- Register, log in, log out, and verify accounts by email.
- Manage personal profile information.
- Allow authenticated users to create and update their own posts.
- Support comments and comment replies through API endpoints.

### Admin Panel

- Dashboard for system statistics.
- Manage posts, including create, update, delete, and approval actions.
- Manage categories and subcategories.
- Manage users, account status, and role assignment.
- Manage roles, permissions, and actions.
- Manage comments and comment replies.
- Protect admin features with custom authentication and permission middleware.

### Integrations

- Cloudinary integration for image upload and media handling.
- Email verification for user accounts.
- Toastr notifications.
- Splide sliders.
- Chart.js statistics charts.

## Screenshots

### Home Page

![Home Page](public/images/screen/Screenshot%202026-05-28%20180831.png)

### Trending Topics and Featured Posts

![Trending Topics](public/images/screen/Screenshot%202026-05-28%20200008.png)

### Top Posts

![Top Posts](public/images/screen/Screenshot%202026-05-28%20200048.png)

### Post Listing

![Post Listing](public/images/screen/Screenshot%202026-05-28%20200104.png)

### Post Detail

![Post Detail](public/images/screen/Screenshot%202026-05-28%20200208.png)

## Tech Stack

| Layer | Technology |
| --- | --- |
| Backend | PHP 8.2, Laravel 11 |
| Frontend | Blade, Vite, Bootstrap 5, CSS, JavaScript |
| Database | MySQL or any Laravel-compatible relational database |
| Authentication | Laravel authentication with custom middleware |
| API | Laravel API routes |
| Media Upload | Cloudinary |
| UI Libraries | Bootstrap Icons, Toastr, Splide |
| Charts | Chart.js |
| Testing | PHPUnit |

## System Requirements

- PHP 8.2 or higher.
- Composer.
- Node.js and npm.
- MySQL or MariaDB.
- A local web environment such as Laragon, XAMPP, Laravel Valet, or Laravel Sail.
- A Cloudinary account if cloud-based image upload is required.

## Installation

Clone the repository:

```bash
git clone <repository-url>
cd news_dsugar
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Run database migrations:

```bash
php artisan migrate
```

Optionally seed sample data:

```bash
php artisan db:seed
```

Create the storage symbolic link:

```bash
php artisan storage:link
```

## Environment Configuration

Update the main values in your `.env` file:

```env
APP_NAME="DSugar News"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news_dsugar
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

CLOUDINARY_URL=
CLOUDINARY_UPLOAD_PRESET=
CLOUDINARY_NOTIFICATION_URL=
```

Email and Cloudinary credentials must be configured with real account values for email verification and cloud image upload to work correctly.

## Running the Project

Start the Laravel development server:

```bash
php artisan serve
```

Start Vite for frontend assets during development:

```bash
npm run dev
```

Build frontend assets for production:

```bash
npm run build
```

After starting the Laravel server, open:

```text
http://127.0.0.1:8000
```

## Project Structure

```text
app/
|-- Http/Controllers      Web and API controllers
|-- Http/Middleware       Authentication and authorization middleware
|-- Http/Requests         Form request validation
|-- Jobs                  Background jobs for images and emails
|-- Models                Eloquent models
|-- Policies              Authorization policies
|-- Repositories          Data access layer
|-- Services              Business logic layer
`-- View/Components       Blade components

resources/views/
|-- admins                Admin panel views
|-- clients               Public website views
|-- components            Shared Blade components
|-- errors                Error pages
`-- mail                  Email templates

routes/
|-- web.php               Web routes
`-- api.php               API routes

public/
|-- css                   Public stylesheets
|-- js                    Public JavaScript files
|-- images                Static and demo images
`-- libraries             Frontend libraries
```

## Main Routes

| Route | Description |
| --- | --- |
| `/` | Home page |
| `/search` | Post search |
| `/dang-nhap` | Login page |
| `/dang-ky` | Registration page |
| `/tai-khoan` | User profile |
| `/bai-viet/{post}` | Post detail |
| `/danh-muc/{category}` | Posts by category |
| `/danh-muc/{category}/{subcategory}` | Posts by subcategory |
| `/admin/dashboard` | Admin dashboard |
| `/admin/bai-viet` | Post management |
| `/admin/kiem-duyet` | Post approval |
| `/admin/danh-muc` | Category management |
| `/admin/users` | User management |
| `/admin/role` | Role management |
| `/admin/permissions` | Permission management |
| `/api/v1/comments` | Comment API |
| `/api/v1/posts` | Post API |
| `/api/v1/stats/*` | Statistics API |

## Testing

Run the test suite:

```bash
php artisan test
```

Or run PHPUnit directly:

```bash
vendor/bin/phpunit
```

## Deployment Notes

- Configure the database connection before running migrations.
- Admin users must have a role type of `System` or `Administration` to access the `/admin` area.
- Configure Cloudinary environment variables before using cloud image uploads.
- Configure SMTP settings before using email verification.
- For production, run `npm run build` and enable Laravel configuration caching as needed.

## Author

**DSugar News**  
A Laravel news publishing and content management project.
