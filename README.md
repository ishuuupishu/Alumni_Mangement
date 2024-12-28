# Alumni Management 

## Project Description
This project is a web-based application designed  to manage alumni data efficiently. The application is built using **Laravel** (backend) and **Vue.js** (frontend) and features authentication, a dashboard, and CRUD operations for managing alumni records. The database is powered by **MySQL**, and the interface is designed with a focus on user experience and simplicity.



## Features

- **Authentication**: Secure login and registration system.
- **Alumni Management**: Add, edit, delete, and view alumni data.
- **Dashboard**: Interactive dashboard to display key alumni statistics.
- **Responsive UI**: Fully responsive and user-friendly design.



## Tech Stack

### Frontend:
- **Vue.js**
- **Tailwind CSS** 

### Backend:
- **Laravel**
- **MySQL** (via phpMyAdmin)


## Installation Guide

### Prerequisites

1. **PHP** (>= 8.0)
2. **Composer**
3. **Node.js** and **npm**
4. **MySQL**
5. **phpMyAdmin**

### Steps

#### 1. Clone the Repository
```bash
   git clone https://github.com/ishuuupishu/Alumni_Management.git
   cd Alumni_Management
```

#### 2. Install Backend Dependencies
```bash
   composer install
```

#### 3. Install Frontend Dependencies
```bash
   npm install
```

#### 4. Configure Environment Variables
1. Duplicate the `.env.example` file and rename it to `.env`.
2. Update the following fields in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=alumni_management
DB_USERNAME=root
DB_PASSWORD=
```

#### 5. Generate Laravel Keys
```bash
   php artisan key:generate
```

#### 6. Run Database Migrations
```bash
   php artisan migrate
```

#### 7. Start the Development Servers
- Start the Laravel server:
```bash
   php artisan serve
```
- Start the Vue development server:
```bash
   npm run dev
```

#### 8. Access the Application
Visit the application in your browser:
```
http://127.0.0.1:8000
```



## Usage

1. **Authentication**: Register or log in to access the alumni management features.
2. **Dashboard**: View summarized alumni data.
3. **Manage Alumni**:
   - Add new alumni records.
   - Edit existing records.
   - Delete records no longer needed.



## Folder Structure
```plaintext
.
├── app        # Laravel application files
├── resources
│   ├── js     # Vue components and frontend code
│   ├── views  # Blade templates
├── routes
│   └── web.php # Laravel routes
├── public     # Public assets
├── database
│   ├── migrations # Database migrations
├── .env       # Environment variables
```



## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature-name`).
3. Commit your changes (`git commit -m 'Add your feature'`).
4. Push to the branch (`git push origin feature/your-feature-name`).
5. Open a Pull Request.




## Contact
For any queries or contributions:
- **Name**: Israth Chowdhury
- **Email**: chowdhuryisrath32@gmail.com
- **GitHub**: [ishuuupishu](https://github.com/ishuuupishu)
