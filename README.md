# ERP Management System

A lightweight ERP (Enterprise Resource Planning) system built with PHP, MySQL, and HTML/CSS. This application allows Admins, HR, and Employees to manage tasks, profiles, and real-time communication via video calling integration using Jitsi Meet.

## 🚀 Features

- ✅ User Registration & Authentication (Admin, HR, Employee)
- 👤 Profile Management
- 📋 Task Assignment & Tracking
- 📊 Dashboard for Users with Notification System
- 🎥 Video Calling Integration (Jitsi Meet)
- 🔐 Role-Based Access Control
- 🛠️ Admin Panel to Block/Unblock Users
- 🧾 Export User Profiles to PDF (FPDF)
- 📡 Notifications for Video Calls

## 📂 Project Structure
ERP/
├── app/ # Core application files
│ ├── controllers/ # MVC Controllers
│ ├── models/ # Database models
│ └── views/ # HTML views with embedded PHP
├── public/ # Public root (index.php lives here)
│ ├── assets/ # CSS/JS/Images
│ └── .htaccess # URL routing
├── vendor/ # Composer dependencies (e.g. PHPMailer, FPDF)
├── config/ # Database and base config
└── README.md 



## 🛠️ Tech Stack

- **Backend:** PHP (OOP, MVC)
- **Frontend:** HTML, CSS, JS
- **Database:** MySQL (via PDO)
- **Mailer:** PHPMailer
- **PDF Export:** FPDF
- **Video Call:** Jitsi Meet
- **Notifications:** Custom DB polling

## 📦 Installation

### Prerequisites

- PHP >= 8.0
- MySQL
- Apache/Nginx (XAMPP recommended for local setup)
- Composer

### Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/erp.git
   cd erp
