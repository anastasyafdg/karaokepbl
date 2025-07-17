<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

# 🎤 Laravel-Based Karaoke Room Reservation Application

**Mikkeu Pangpang Karaoke** — a web-based karaoke room reservation system we developed as part of our Project Based Learning (PBL), focusing on building a modern karaoke room reservation system. 🎯  
We created this application to meet the needs of users who want to reserve karaoke rooms easily, quickly, and efficiently — all without having to visit the location in person.

🧠 **Why We Built This Application:**

- Many karaoke venues still use manual systems that make the reservation process inconvenient.  
- Users often struggle to get real-time information about room availability.  
- There is also a lack of online booking features with integrated payment and automatic confirmation.

---


## 👨‍💻 Development Team

| Full Name                     | Student ID   |
|------------------------------|--------------|
| Anastasya Floresha Ginting   | 3312401068   |
| Windy Yohana Gurning         | 3312401066   |
| Saskia Ananda Irawan         | 3312401070  |
| Erlangga Wiratama            | 3312401072   |
| Melanie Putri                | 3312401075   |

---


## 📬 Contact Information

If you have any questions, feedback, or suggestions regarding this project, please feel free to contact us via:

- Email: anastasyaginting565@gmail.com  
- WhatsApp: [Click to chat](https://wa.me/6282213806284)

We would be very happy to hear your input!


## 📌 Key Features

- User registration and login
- Karaoke room booking
- Upload proof of payment
- Room management (admin)
- Review & rating
- Booking history
- Edit profile

---


## 🔗 Important Links

| Description           | Link                                                                 |
|-----------------------|----------------------------------------------------------------------|
| 🌐 Demo Website        | [Click here](https://youtu.be/m-Rd70ICE_c?si=0jt0NqTOOLRwxxxR)       |
| 🎥 Presentation        | [Click here](https://youtu.be/XTfC4ndbkgY?si=FVmWdbl8RJToNRnk)       |
| 📄 PBL Report (PDF)    | [Click here](https://drive.google.com/file/d/14YXxGrRUxEYF5XWeL_BBslCc97IGYvCM/view?usp=sharing) |
| 📘 Manual Book         | [Click here](https://drive.google.com/file/d/17wW91VCAJRKyoaQ9b7oD7trhvLk7ie7S/view?usp=sharing) |

---


## 📥 How to Download & Open the PDF Report or Manual Book

1. Click on the link of the desired document above.
2. The file will open in your browser.
3. Click the "Download" button or the down arrow icon.
4. Open the PDF file using a browser or a PDF reader like Adobe Reader.

---


## ⚙️ System Requirements

- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Node.js & NPM
- Git (optional)

---


## 🚀 How to Install the Application

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/project-name.git](https://github.com/anastasyafdg/karaokepbl.git
cd karaokepbl

### 2. Install Dependency Laravel

```bash
composer install
```

### 3.  Copy the .env File

```bash
cp .env.example .env
```

### 4. Generate App Key

```bash
php artisan key:generate
```

### 5. Configure the Database
Edit the .env file and adjust the following section:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=karaoke
DB_USERNAME=root
DB_PASSWORD=        # isi jika ada password
```

### 6. Migrate and Seed the Database

```bash
php artisan migrate --seed
```

### 7. Install Frontend Dependencies

```bash
npm install
npm run build
```

### 8. Run the Server

```bash
php artisan serve
```

---
