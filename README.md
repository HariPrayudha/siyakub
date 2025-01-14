# SiYakub - Ayam KUB Service Information System

SiYakub (Sistem Informasi Pelayanan Ayam KUB) is a web-based platform designed to streamline and enhance the management and distribution of Ayam KUB services. It provides an intuitive interface for customers and administrators, featuring comprehensive information about the services offered, distribution channels, ordering process, and contact options.

## Navigation Features
The application includes the following navigation sections:

- **Home (Beranda)**: Overview of the services provided by SiYakub.
- **About Us (Tentang Kami)**: Details about the organization behind SiYakub.
- **Portfolio (Portofolio)**: Showcase of past projects and achievements.
- **Chicken Types (Jenis Ayam)**: Information about different types of Ayam KUB available.
- **Distribution (Distribusi)**: Details of the distribution network and process.
- **Ordering Flow (Alur Pemesanan)**: Step-by-step guide to placing an order.
- **Contact Us (Kontak Kami)**: Communication channels for queries or support.

## Folder Structure
- `admin/`: Admin panel for managing services, distribution, and customer data.
- `assets/`: Contains assets like images, CSS, and JavaScript files.
- `config/`: Configuration files for database and application settings.
- `forms/`: Handles forms for user interaction like order submission or queries.
- `sql database/`: SQL file(s) to set up the application's database.
- `index.php`: Main landing page of the website.
- `login.php`: Login page for registered users.
- `register.php`: User registration page.
- `autentikasi.php`: Handles user authentication.

## Installation
Follow these steps to set up and run SiYakub:

1. Clone this repository:
   ```bash
   git clone https://github.com/HariPrayudha/siyakub.git
   ```
2. Navigate to the project directory:
   ```bash
   cd siyakub
   ```
3. Move the project folder to your web server's root directory (e.g., `htdocs` for XAMPP):
   ```bash
   mv * /path/to/your/server/htdocs/siyakub
   ```
4. Import the database using the SQL file in the `sql database/` directory:
   ```bash
   mysql -u username -p database_name < "sql database/your-database-file.sql"
   ```
5. Configure the database connection in the configuration file (e.g., `config/database.php`).
6. Access the application via your browser:
   ```
   http://localhost/siyakub
   ```

## Contribution
Contributions are welcome! Feel free to fork this repository, create an issue, or submit a pull request with your enhancements or bug fixes.

## License
This project does not have a specific license yet. Please contact the developer if you'd like to use it for specific purposes.

## About
Developed with ❤️ to support the effective distribution and service of Ayam KUB.
