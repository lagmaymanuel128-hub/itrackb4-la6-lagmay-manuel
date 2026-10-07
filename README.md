<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# ITRACKB4 LA6: Two Filters, One Route

**Name:** Firstname Lastname
**Block:** 4A

This project adds two query-string filters (course and year) to the `/students` list page. All four URLs use the same single `students.index` route. The page also has links that keep the other filter applied, a redirect for the old filter URL, and a navigation link that stays marked.

---

## Part E: Explain Your Reasoning

### Q1. Why was no new route needed for the second filter?

The router only looks at the path of the URL, which is `/students` in all four cases. It never sees the query string, so `/students`, `/students?course=BSIT`, `/students?year=4` and `/students?course=BSIT&year=4` all look identical to it and all match my one existing `students.index` route. The filtering happens afterwards inside the `index()` method, where I read `course` and `year` with `$request->query()`. Adding a second filter only meant reading one more value in the controller, not teaching the router anything new.

### Q2. What would "year 4 only, no course filter" look like if both filters were route parameters?

The URL would need a fixed position for each parameter, something like `/students/course/{course}/year/{year}`. Route parameters are positional, so I can't leave the course out and keep the year. I would have to put a filler value in the course spot, such as `/students/course/all/year/4`, or build a separate route just for year. Every extra filter or combination would need its own route or its own filler value, and the order would be locked in. Query strings avoid all of that because each value is named and optional, so `/students?year=4` just leaves the course out.

### Q3. Which one needed a change to the nav pattern: the detail page or the filter?

The detail page needed the change. My list page path is `/students`, but a detail page is `/students/3`, which is longer, so a pattern that only matches `students` would not mark the link there. I had to add a wildcard so that `request()->is('students*')` matches both. The filter case needed nothing because the query string is not part of the path. `request()->is()` only compares the path, so `/students?course=BSIT` still has the path `/students` and the link stays marked automatically.

### Q4. Why delete the old filter method but keep the empty store and update methods?

The old filter method was finished work that I replaced with a better design, the query-string filter on `index()`. Nothing will ever point to it again, so keeping it would leave two filter implementations in the project, with one of them dead. The empty `store` and `update` methods are different because they are work that has not been done yet. They will be filled in during Weeks 7 and 10, so keeping them records what is still outstanding. The rule I followed is to keep code that is not finished yet and delete code that has been replaced.
