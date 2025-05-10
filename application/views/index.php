<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Prompt', sans-serif;
            background: linear-gradient(to bottom, #eafaf1, #d4f1d4);
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        .header {
            width: 100%;
            background: linear-gradient(90deg, #152d1a, #45724f);
            color: #fff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header img {
            width: 75px;
            height: auto;
        }

        .header nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
        }

        .header nav a:hover {
            text-decoration: underline;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #6b9474, #28a745);
            color: white;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .hero a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 30px;
            font-size: 1rem;
            background: #0066aa;
            color: rgb(255, 255, 255);
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .hero a:hover {
            background: #131f30;
        }

        /* Section */
        .section {
            padding: 60px 20px;
            text-align: center;
        }

        .section-title {
            font-size: 1.8rem;
            margin-bottom: 20px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #28a745, #218838);
            margin: 10px auto 0;
        }

        .card {
            max-width: 300px;
            margin: 20px auto;
            background: #f6fff4;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card h3 {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .card p {
            padding: 10px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        /* Footer */
        .footer {
            background: #213824;
            color: #ecf0f1;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: #7ce294;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .card p {
            padding: 10px;
            line-height: 0.5;
            /* Adjust this value as needed */
        }

        .footer-logo {
            width: 120px;
            /* ปรับขนาดความกว้างตามต้องการ */
            height: auto;
            /* ให้ความสูงปรับตามอัตราส่วน */
            margin-bottom: 10px;
            /* เพิ่มระยะห่างด้านล่าง (ถ้าจำเป็น) */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav>
            <a href="#developer">DEVELOPER</a>
            <a href="#producer">PROJECT PRODUCER</a>
            <a href="#teacher">SUBJECT TEACHER</a>
        </nav>
        <div class="social-links">
            <a href="https://www.facebook.com/aephoto1997" target="_blank" class="social-icon">
                <img src="<?= base_url("assets/dist/img/fb.png") ?>" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/ae.timeless10" target="_blank" class="social-icon">
                <img src="<?= base_url("assets/dist/img/ig.png") ?>" alt="Instagram">
            </a>
        </div>
    </header>
    <style>
        /* Social Links Container */
        .social-links {
            display: flex;
            gap: 10px;
            /* ระยะห่างระหว่างไอคอน */
            align-items: center;
        }

        /* Social Icon Styling */
        .social-icon img {
            width: 30px;
            /* ขนาดไอคอน */
            height: 30px;
            transition: transform 0.3s ease;
            /* เพิ่มเอฟเฟกต์ */
        }

        .social-icon img:hover {
            transform: scale(1.2);
            /* ขยายไอคอนเมื่อ hover */
        }
    </style>

    <!-- Hero Section -->
    <section class="hero">
        <div style="display: flex; align-items: center; justify-content: space-around;">
            <img src="<?= base_url("assets/dist/img/LogoUBRU.png") ?>" alt="Logo" style="width: 85px; height: auto;">
            <img src="<?= base_url("assets/dist/img/CT_1.png") ?>" alt="Logo" style="width: 115px; height: auto;">
        </div>
        <h1>การพัฒนาระบบบริหารจัดการรับถ่ายภาพ</h1>
        <p>A DEVELOPMENT OF PHOTOGRAPHY MANAGEMENT SYSTEM</p>
        <a href="<?= site_url("home") ?>">PROJECT</a>
    </section>


    <section id="developer" class="section">
        <h2 class="section-title">PROJECT DEVELOPER</h2>
        <h3>ผู้พัฒนาระบบ</h3>
        <div class="image-container">
            <img
                src="<?= base_url("assets/dist/img/1.png") ?>"
                alt="Front Image"
                class="front-image">
            <img
                src="<?= base_url("assets/dist/img/2.png") ?>"
                alt="Back Image"
                class="back-image">
        </div>
    </section>

    <style>
        /* ตั้งค่าพื้นฐานสำหรับ Section */
        .section {
            display: flex;
            flex-direction: column;
            /* จัดเรียงแนวตั้ง */
            justify-content: center;
            /* ตรงกลางแนวตั้ง */
            align-items: center;
            /* ตรงกลางแนวนอน */
            min-height: 100vh;
            /* ความสูงเต็มหน้าจอ */
            background-color: #eafaf1;
            /* สีพื้นหลัง */
            padding: 20px;
            margin: 0;
        }

        /* Container ของรูปภาพ */
        .image-container {
            position: relative;
            width: 330px;
            /* ขนาดของ container */
            height: 550px;
            /* ความสูงของ container */
            perspective: 1000px;
            /* เพิ่มมิติ */
            display: flex;
            justify-content: center;
            /* จัดรูปให้อยู่ตรงกลางแนวนอน */
            align-items: center;
            /* จัดรูปให้อยู่ตรงกลางแนวตั้ง */
        }

        /* รูปด้านหน้า */
        .front-image,
        .back-image {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            backface-visibility: hidden;
            /* ซ่อนด้านหลัง */
            transition: transform 0.8s ease, opacity 0.8s ease;
            /* เพิ่มการเปลี่ยนแปลงแบบนุ่มนวล */
        }

        /* รูปด้านหลัง */
        .back-image {
            transform: rotateY(180deg);
            /* หมุนด้านหลัง */
            opacity: 0;
        }

        /* เมื่อ Hover บน Container */
        .image-container:hover .front-image {
            transform: rotateY(180deg);
            /* หมุนด้านหน้า */
            opacity: 0;
        }

        .image-container:hover .back-image {
            transform: rotateY(0);
            /* แสดงด้านหลัง */
            opacity: 1;
        }
    </style>

    <!-- Developer Section
    <section id="developer" class="section">
        <h2 class="section-title">PROJECT DEVELOPER</h2>
        <div style="text-align: center;">
            <img src="img/1.png" alt="Project Developer" style="max-width: 25%; height: auto;">
            <img src="img/2.png" alt="Project Developer Additional" style="max-width: 25%; height: auto;">

        </div>
    </section> -->

    <section id="producer" class="section">
        <h2 class="section-title">PROJECT PRODUCER</h2>
        <h3>อาจารย์ที่ปรึกษาโครงงาน</h3>
        <div class="card-container">
            <!-- Card อาจารย์คนที่ 1 -->
            <div class="card">
                <img src="<?= base_url("assets/dist/img/Aj_surajet.png") ?>" alt="Surajet Onthuk" class="card-image">
                <div class="card-content">
                    <p>อาจารย์ผู้ดูแลโครงงาน</p>
                </div>
            </div>
            <!-- Card อาจารย์คนที่ 2 -->
            <div class="card">
                <img src="<?= base_url("assets/dist/img/Aj_onuma.png") ?>" alt="Onuma Niamhom" class="card-image">
                <div class="card-content">
                    <p>อาจารย์ผู้ดูแลโครงงาน</p>
                </div>
            </div>
    </section>

    <style>
        /* General Section */
        .section {
            text-align: center;
            margin: 40px auto;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Card Container */
        .card-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            /* เพิ่มระยะห่างระหว่างการ์ด */
            flex-wrap: wrap;
            /* จัดการ์ดให้อยู่ในแถวใหม่ถ้าพื้นที่ไม่พอ */
        }

        /* Card Style */
        .card {
            width: 600px;
            /* เพิ่มความกว้างการ์ด */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            /* ขยายการ์ดเมื่อ Hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Card Image */
        .card-image {
            width: 100%;
            height: 300px;
            /* ปรับความสูงภาพให้ใหญ่ขึ้น */
            object-fit: cover;
            /* ปรับให้รูปภาพเต็มพื้นที่ */
        }

        /* Card Content */
        .card-content {
            padding: 20px;
            background: #f9f9f9;
            text-align: center;
        }

        .card-content h3 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .card-content p {
            font-size: 1rem;
            color: #666;
        }
    </style>

    <!-- Subject Teacher Section -->
    <section id="teacher" class="section">
        <h2 class="section-title">SUBJECT TEACHER</h2>
        <div class="card">
            <img src="<?= base_url("assets/dist/img/Aj_onuma.png") ?>" alt="Teacher">
            <p>อาจารย์ผู้ประสานงานประจำรายวิชา</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <img class="footer-logo" src="<?= base_url("assets/dist/img/itec_logo.png") ?>" alt="Footer Logo">
        <p class="footer__copy"> สาขาวิชา เทคโนโลยีคอมพิวเตอร์</p>
        <p class="footer__copy">&#169; คณะเทคโนโลยีอุตสาหกรรม มหาวิทยาลัยราชภัฏอุบลราชธานี</p>
    </footer>
</body>

</html>