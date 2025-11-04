<!--
Guidance for AI coding agents working on the `live-resume` repository.
Keep this file concise and strictly about patterns, files, and commands that help an agent be productive immediately.
-->

# Repository quick-start for AI agents

- Project type: Laravel 12 application (PHP 8.2+) with Vite/Tailwind frontend.
- Purpose: a single-user resume builder/showcase. User data (including projects, skills, education, certificates) is stored on the `users` table as JSON fields.

## Big-picture architecture (what to know first)

- Backend: Laravel MVC. Controllers live in `app/Http/Controllers`. Primary resume logic is in `ResumeController` (`show`, `edit`, `update`).
- Model: the `App\Models\User` model contains resume fields: see `app/Models/User.php` and migration `database/migrations/2025_10_21_064634_add_full_resume_data_to_users_table.php` for exact column names: `role`, `address`, `phone`, `summary`, `projects` (json), `skills` (json), `education` (json), `certificates` (json).
- Routes: `routes/web.php` defines public resume view (`/resume/{user}`) and authenticated edit/update endpoints (`/resume/edit`, `/resume/update`).
- Frontend: Vite + Tailwind + Alpine.js. Main entry points: `resources/js/app.js` and `resources/css/app.css`. Blade views include assets with `@vite([...])`.

## Typical developer workflows (commands an agent should recommend/use)

- Full setup (composer + npm + migrations): use `composer.json` `setup` script. Equivalent commands:
  - `composer install`
  - copy `.env.example` -> `.env` and run `php artisan key:generate`
  - `php artisan migrate` (project uses sqlite by default in `post-create-project-cmd` but check `.env`)
  - `npm install && npm run build`
- Local development (recommended): run Laravel, queue worker, and Vite concurrently. `composer.json` `dev` script uses `npx concurrently` to run: `php artisan serve`, `php artisan queue:listen --tries=1`, and `npm run dev` (Vite). Use the same in Windows `cmd.exe` shell.
- Build assets: `npm run build` (runs `vite build`).
- Run tests: `composer test` (runs `php artisan test`). Note: tests use Pest; see `tests/`.

## Project-specific conventions & patterns

- JSON fields for multi-item resume sections: projects, skills, education, certificates are stored as JSON arrays on the `users` row. Controllers expect `projects`/`education`/`certificates` as PHP arrays (see `ResumeController@update` validation rules). When editing in forms, `skills` are provided as a comma-separated string and converted to an array in the controller.
- Validation strategy: `ResumeController@update` performs nested array validation using `projects.*.title`, `projects.*.achievements.*`, etc. If you add form fields, follow the same validation shape.
- Mass-assignment: `User::$fillable` contains all resume fields — use `$user->fill($validated)` followed by `$user->save()` (pattern used in the repository).
- Views: Blade templates are under `resources/views`. Public resume view is `resources/views/resume/show.blade.php` and editing UI is `resources/views/resume/edit.blade.php`.

## Integration points and external dependencies

- Laravel packages: see `composer.json` (laravel/framework v12, breeze, pest, pint). Use the existing service providers and package discovery flow (composer scripts already run `artisan package:discover`).
- Frontend packages: Vite, Tailwind, Alpine, laravel-vite-plugin. Assets are referenced with `@vite()` in Blade.
- Background processing: repo runs `php artisan queue:listen` in dev script; queue jobs may exist in `app/Jobs` (none present now) — be cautious when modifying queue behavior.

## Files to open when diagnosing common tasks (quick links)

- Data model and casts: `app/Models/User.php` (look at `$fillable` and `casts()` for arrays and hashed password).
- Resume flow: `app/Http/Controllers/ResumeController.php` (validation, skills parsing, save flow).
- Routes: `routes/web.php` (public vs authenticated endpoints).
- Migration for fields: `database/migrations/2025_10_21_064634_add_full_resume_data_to_users_table.php` (column names and JSON usage).
- Frontend entry points: `resources/js/app.js`, `resources/css/app.css`, Blade layouts under `resources/views/layouts` (they include `@vite`).

## Examples to copy-paste (small snippets agents commonly need)

- How the controller turns a comma list into skills array (exact code pattern):

  // in `ResumeController@update`
  if (!empty($validated['skills'])) {
      $validated['skills'] = array_filter(array_map('trim', explode(',', $validated['skills'])));
  } else {
      $validated['skills'] = [];
  }

- Route names that must be preserved when linking from views:
  - `route('resume.show', $user)` -> public resume
  - `route('resume.edit')` and `route('resume.update')` -> authenticated edit/update

## Things an agent must NOT change without human confirmation

- Database column names and JSON structure for resume fields — changes are breaking for existing data and should be coordinated.
- Modify authentication/authorization flows (`routes/web.php` middleware or `User` auth attributes) without explicit instruction.

## Quick troubleshooting tips (discovered behaviors)

- If assets don't load during development, confirm Vite is running (`npm run dev`) and Blade includes use `@vite([...])`. The dev script runs `vite` which opens a dev server.
- Tests run with Pest: if a failing test references DB state, run `php artisan migrate:fresh --seed` or check `tests/` fixtures.

---

If anything here is unclear or you want more examples (for instance, a sample `resume.edit` Blade form or common test fixtures), tell me which area to expand and I will update this file.
