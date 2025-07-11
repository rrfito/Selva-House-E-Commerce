![poster](assets2/images/readme/SelvaHousePoster.png)

<h1 align="center">Selva House E-commerce</h1>
<p align="center">A simple E-commerce website that utilizes PHP as a backend and css with a little bootsrap seasoning for styling, suitable for those who want to learn simple PHP.</h1>

## ⚙️ Installation & Usage

Follow these steps to set up and run Selva House E-commerce on your local machine.

### Prerequisites

* **XAMPP**
* **Git**

### Step-by-Step Guide

1.  **Clone the Repository:**
    Start by cloning the project to your local machine using Git.
    ```bash
    git clone https://github.com/rrfito/Selva-House-E-Commerce.git
    cd SelvaHouseE-commerce
    ```
2.  **Move to XAMPP:**
    Copy the entire `SelvaHouseE-commerce` folder into your web server's document root (e.g., `C:\xampp\htdocs\` for XAMPP users).
3.  **Database Setup:**
    * Open your web browser and go to `http://localhost/phpmyadmin`.
    * Create a new database named `database`.
    * Import the `database.sql` file (located in your project root) into the newly created database.
    * **Note:** Some tables in the provided `database.sql` might contain **empty or placeholder data** for certain sensitive fields. You can populate the necessary data either through the **Admin Panel** of the website or directly via **phpMyAdmin**.
4.  **Configure Database Connection:**
    * Navigate to `controller/koneksi.php` (or similar path depending on your project structure) within your project folder.
    * if you want to update the database credentials (username, password, database name) to match your local MySQL setup.
5.  **Run the Application:**
    * Start your Apache and MySQL modules in XAMPP.
    * Open your web browser and go to `http://localhost/Selva-House-E-Commerce/halaman/Login.php` to access the website.

## ⚠️ Important Note: WhatsApp Confirmation Feature

To fully enable the "Confirm via WhatsApp" feature, you'll need to **replace the placeholder phone number** in the PHP code with your **active WhatsApp number**.

Find the following code snippet in `page_customer\data_transaction.php` :

```php
 echo '<a href="https://api.whatsapp.com/send?phone=(replace this with your whatsapp number)&text=Halo,%20saya%20'
```

## 📸 Feature Gallery

### Login
<img src="assets2/images/readme/Login.png" width="600">

### Register
<img src="assets2/images/readme/Register.png" width="600">

### Admin Panel
<img src="assets2/images/readme/dasboardAdmin.png" width="600">
<img src="assets2/images/readme/ManajemenData.png" width="600">

### Dashboard Customer
<img src="assets2/images/readme/dashboardCustomer.png" width="600">

### Order Page
<img src="assets2/images/readme/Pemesanan.png" width="600">

### Order history
<img src="assets2\images\readme\RiwayatPemesanan.png " width="600">
