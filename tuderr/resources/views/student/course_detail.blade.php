<!DOCTYPE html>
<html>

<head>
    <title>รายละเอียดคอร์สของฉัน</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: 10px auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .back-btn {
            display: block;
            margin-left: auto;
            margin-bottom: 15px;
            padding: 6px 12px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            text-decoration: none;
            color: #555;
            font-size: 14px;
            background: #fafafa;
            transition: all 0.2s ease;
            width: fit-content;
        }

        .back-btn:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }

        .title {
            font-size: 28px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .course-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .desc {
            font-size: 16px;
            color: #555;
            margin-bottom: 25px;
            line-height: 1.7;
        }

        .price {
            color: black;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 26px;
            background: #0f172a;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .buy-section {
            display: flex;
            justify-content: flex-end;
        }

        .course-meta {
            display: flex;
            gap: 25px;
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 20px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .meta-item ion-icon {
            font-size: 18px;
            color: #64748b;
        }
    </style>

</head>
<body>

    @include('components.navbar')

    <div class="container">

        <a href="/" class="back-btn">
            < กลับ</a>
                <div class="title">{{ $course->title }}</div>

                <img class="course-img" src="{{ asset('course_images/' . $course->photo) }}">
                <div class="course-meta">

                    <div class="meta-item">
                        <ion-icon name="person-outline"></ion-icon>
                        <span>John Smith</span>
                    </div>

                    <div class="meta-item">
                        <ion-icon name="time-outline"></ion-icon>
                        <span>40 hours</span>
                    </div>

                    <div class="meta-item">
                        <ion-icon name="book-outline"></ion-icon>
                        <span>All Levels</span>
                    </div>

                </div>
                <div class="section-title">รายละเอียดคอร์ส</div>

                <div class="desc">
                    {{ $course->description }}
                </div>

                <div class="price">
                    {{ $course->price }} บาท
                </div>

    </div>

</body>

</html>