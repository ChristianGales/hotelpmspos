# Hotel Property Management System with Restaurant Point of Sale

A comprehensive hotel management solution that integrates property management and restaurant point of sale functionality in a single platform.

## Features

- **Property Management System (PMS)**
  - Room booking and reservation management
  - Guest check-in and check-out
  - Room status tracking
  - Guest information management
  - Billing and invoicing

- **Restaurant Point of Sale (POS)**
  - Order management
  - Menu management
  - Table management
  - Kitchen order tracking
  - Payment processing

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 8.0
- Composer
- Node.js >= 16.x
- NPM or Yarn
- MySQL or PostgreSQL database
- Web server (Apache/Nginx)

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/ChristianGales/hotelpmspos.git
cd hotelpmspos
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install JavaScript dependencies**

```bash
npm install
```

4. **Environment configuration**

Copy the example environment file and configure your settings:

```bash
cp .env.example .env
```

5. **Generate application key**

```bash
php artisan key:generate
```

6. **Configure database settings**

Edit the `.env` file and configure your database connection and other settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_pms_pos
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. **Run database migrations**

```bash
php artisan migrate
```

8. **Seed the database (optional)**

```bash
php artisan db:seed
```

9. **Build frontend assets**

```bash
npm run build
```

## Development

To run the application in development mode:

1. **Start the development server**

```bash
php artisan serve
```

2. **Watch for asset changes (in a separate terminal)**

```bash
npm run dev
```

The application will be available at `http://localhost:8000`

## Usage

### Default Credentials

After seeding the database, you can log in with:

- **Email:** admin@hotel.com
- **Password:** password

*Make sure to change these credentials in production.*

### Managing Rooms

Navigate to the Rooms section to add, edit, or delete hotel rooms and set their availability status.

### Processing Orders

Use the POS module to take restaurant orders, manage tables, and process payments.

### Reports

Access the Reports section to view occupancy rates, revenue, and sales analytics.

## Production Deployment

For production deployment:

1. Set `APP_ENV=production` and `APP_DEBUG=false` in your `.env` file
2. Run `npm run build` to compile optimized assets
3. Configure your web server to point to the `public` directory
4. Set up proper file permissions for storage and cache directories
5. Enable caching:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the MIT license.

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/ChristianGales/hotelpmspos).

## Acknowledgments

Built with Laravel and modern web technologies to provide an efficient hotel management solution.
