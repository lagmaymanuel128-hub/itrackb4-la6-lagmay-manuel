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
