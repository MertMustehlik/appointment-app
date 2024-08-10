## Routes

### Authenticate

##### User

- `POST /api/v1/auth/login`: Authenticates the user and returns a JWT token.
- `POST /api/v1/auth/logout`: Logs out the user.
- `POST /api/v1/auth/refresh`: Refreshes the user's JWT token.
- `GET /api/v1/auth/me`: Returns the details of the authenticated user.

##### Admin

- `POST /api/netAdmin/v1/auth/login`: Authenticates the admin and returns a JWT token.
- `POST /api/netAdmin/v1/auth/logout`: Logs out the admin.
- `POST /api/netAdmin/v1/auth/refresh`: Refreshes the admin's JWT token.
- `GET /api/netAdmin/v1/auth/me`: Returns the details of the authenticated admin.

### Available Appointments

- `GET /api/netAdmin/v1/available-appointments`: List all available appointments.
- `POST /api/netAdmin/v1/available-appointments`: Create a new available appointment.
- `GET /api/netAdmin/v1/available-appointments/{id}`: Get details of a specific available appointment.
- `DELETE /api/netAdmin/v1/available-appointments/{id}`: Delete a specific available appointment.

### Appointments

- `GET /api/v1/appointments`: List all appointment.
- `POST /api/v1/appointments`: Create a new appointment.
- `GET /api/v1/appointments/{id}`: Get details of a specific appointment.
- `DELETE /api/v1/appointments/{id}`: Delete a specific appointment.

## Installation

### 1. Clone

```sh
git clone https://github.com/MertMustehlik/appointment-app.git
```

```sh
cd appointment-app
```

### 2. Copy .env File

```sh
cp .env.example .env
```

### 3. Install Dependencies

```sh
composer install
```

### 4. Run Migrations and Seed Database

```sh
php artisan migrate --seed
```

### 5. Generate Application Key

```sh
php artisan key:generate
```

### 6. Start the Server

```sh
php artisan serve
```

Server is started: http://127.0.0.1:8000.
