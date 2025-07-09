# Laravel Livewire + FrankenPHP + Mercure Demo

This repository is a simple demo showing how to use [Laravel Livewire](https://laravel-livewire.com/) with [FrankenPHP](https://frankenphp.dev/) and [Mercure](https://mercure.rocks/) for modern, real-time PHP apps.

You’ll get a ready-to-go setup featuring:

- Laravel 12 (latest)
- Livewire for reactive UIs
- FrankenPHP as the blazing-fast PHP server
- Mercure for real-time broadcasting (WebSockets & SSE)
- Laravel Sail (Docker-based dev environment)

---

## Features

- Real-time UI updates with Livewire + Mercure
- Dockerized with Laravel Sail (so it “just works”)
- Example queue jobs, seeders, and broadcast events

---

## Requirements
- Docker & Docker Compose (Laravel Sail requirement)
- Node.js v22+ (for frontend build)


### How It Works
- **Livewire** makes building dynamic interfaces a breeze — without writing much JavaScript.
- **FrankenPHP** serves your Laravel app natively, offering superior performance and HTTP/2/3 support out of the box.
- **Mercure** pushes updates to browsers in real time, powering Livewire’s reactivity via Server-Sent Events.
- The whole stack runs in **Docker**, so there’s no PHP version hell or system conflicts.

---

## Getting Started

### 1. Clone the Repo

```bash
git clone https://github.com/besrabasant/frakenphp-demo.git
cd frakenphp-demo
```

## 2. Copy Environment File
```bash
cp .env.example .env
```

### 3. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 4. Start Containers
```bash
./vendor/bin/sail up
```
The app will be up at https://localhost:8000
(If you’re using WSL or Docker Desktop, see your Docker dashboard for the exact port.)


### 5. Run Migrations & Seeders
```bash
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

### 6. Start Queue Worker
Open a second terminal and run:

```bash
./vendor/bin/sail artisan queue:work
```
You need this for any background jobs (notifications, broadcasts, etc).



## Troubleshooting
- If containers fail to start, ensure Docker is running.
- For permission issues, try `./vendor/bin/sail` `npm run build` as your user (not root).
- If `queue:work` isn’t processing, check your .env and ensure queues are set up as database or redis.

## Credits
- [Laravel](https://laravel.com/)
- [Laravel Livewire](https://laravel-livewire.com/)
- [FrankenPHP](https://frankenphp.dev/)
- [Mercure](https://mercure.rocks/) 

## License
MIT – do what you want, just don’t blame me if you break prod 😉

## Contributing
PRs are welcome! Open an issue if you find bugs or have suggestions.

Happy coding! 🚀
