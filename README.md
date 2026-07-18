# wE-Study

A collaborative online study tool (virtual study rooms, shared study resources)
built with plain HTML/CSS/JS on the front end and PHP + MySQL on the back end.

## Project structure

```
index.html            Landing page (served at the site root)
css/websitecss.css    Styles
js/websitejs.js        Front-end logic
html/                 All PHP pages
  db.php              Shared DB connection + login helper
  config.sample.php   Template for your DB credentials
  config.php          Your real credentials (gitignored — you create this)
schema.sql            Database tables
```

## Hosting on InfinityFree

1. **Create a MySQL database**
   In the InfinityFree control panel go to **MySQL Databases**, create a
   database, and note the **host**, **username**, **password**, and
   **database name**.

2. **Create the tables**
   Open **phpMyAdmin** for that database and run the contents of
   [`schema.sql`](schema.sql).

3. **Add your credentials**
   Copy `html/config.sample.php` to `html/config.php` and fill in the four
   values from step 1. `config.php` is gitignored so it is never committed.

4. **Upload the files**
   Upload everything into the `htdocs` folder so the layout is:
   `htdocs/index.html`, `htdocs/css/`, `htdocs/js/`, `htdocs/html/`.
   (Don't forget to also upload the `config.php` you created — it is not in Git.)

5. Visit your domain. The landing page loads from `index.html` and every
   feature links into `html/`.

## Security notes

- All database queries use **prepared statements** (no SQL injection).
- Passwords are stored as **bcrypt hashes** (`password_hash` /
  `password_verify`), never in plaintext.
- Editing/deleting a room is gated by a **PHP session** set at login, so a
  user can only modify their own rooms.
- Real database credentials live in the gitignored `config.php`.

## Known limitations on the free tier

- InfinityFree's free plan disables the PHP `mail()` function, so:
  - Sign-up creates the account **directly** (no email verification step).
  - The "Add Study Resource" form does not actually email the submission.
