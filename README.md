[README.md]
# CampusConnect Web Application

## Topic
CampusConnect is a student event and campus activity website.

## Pages
- `index.html` — Home page with JavaScript welcome prompt and show/hide interaction.
- `events.html` — Events page.
- `gallery.html` — Gallery using CSS flip cards and hover effects.
- `register.html` — Registration form with JavaScript validation.
- `php/process_registration.php` — Receives form data using POST and inserts it into MySQL.
- `php/view_registrations.php` — Retrieves and displays database records using MySQLi.
- `sql/database.sql` — Creates the database/table and adds a sample record.
- `css/style.css` — Single external stylesheet for all pages.
- `js/script.js` — External JavaScript file linked to all pages.

## Running the project with XAMPP
1. Install XAMPP.
2. Copy the `CampusConnect_Website` folder into `C:/xampp/htdocs/`.
3. Start Apache and MySQL in XAMPP.
4. Open phpMyAdmin at `http://localhost/phpmyadmin`.
5. Import `sql/database.sql`.
6. Visit `http://localhost/CampusConnect_Website/index.html`.
7. Submit the registration form.
8. View saved records at `http://localhost/CampusConnect_Website/php/view_registrations.php`.

## JavaScript features
1. Personalized welcome prompt on the Home page.
2. Show/hide Innovation & Career Day details.
3. Light/dark theme toggle saved in localStorage.
4. Mobile navigation menu.
5. Client-side form validation for required fields, email, phone and confirmation checkbox.

## Video demonstration order
1. Explain the website purpose.
2. Show the Home page and personalized welcome.
3. Navigate through all pages.
4. Demonstrate the Flexbox navigation bar and responsive menu.
5. Demonstrate the Gallery flip cards.
6. Demonstrate the form.
7. Submit the form with missing fields to show validation.
8. Submit valid data and show PHP success output.
9. Open `view_registrations.php` and demonstrate the retrieved MySQL record.
10. Explain one challenge and its solution.

## Notes
The gallery uses remote Unsplash images, so an internet connection is useful when viewing the gallery.
