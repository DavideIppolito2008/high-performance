# high-performance

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="360" alt="Laravel Logo"></a></p>

Small Laravel app demonstrating fitness strength standards and a responsive "average strength" page.

## High Performance

This project is focused on measuring and presenting strength standards in a lightweight, high-performance way:

- Minimal server-side work: the controller pre-fetches threshold tables and the client computes results locally to keep response times low.
- Database-driven thresholds: strength levels are stored in `strength_standards` so lookups are fast and easy to update.
- Small, responsive UI: the layout is intentionally minimal and uses a compact CSS payload to reduce render cost on phones.
- Local-first dev setup: migrations and seeders provide a fast way to run tests locally with SQLite.

## What’s included

- `resources/views/fitness/strength/forza_media.blade.php` — responsive page and client logic.
- `app/Http/Controllers/Fitness/StrengthController.php` — prepares `forzaData` used by the view.
- `database/migrations/2026_02_18_000000_create_strength_standards_table.php` and `database/seeders/StrengthStandardsSeeder.php` — DB schema and seed data.

## License

MIT
