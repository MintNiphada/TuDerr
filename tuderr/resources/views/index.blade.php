<!DOCTYPE html>
<html>

<head>
    <title>Online Courses</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: #f4f6f9;
            margin: 0;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 40px 0;
        }

        h1 {
            margin-bottom: 30px;
        }

        .courses {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .card {
            width: 280px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .card-body {
            padding: 18px;
        }

        .title {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .desc {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .price {
            font-weight: 500;
            color: black;
            margin-bottom: 12px;
        }

        .btn {
            display: block;
            text-align: center;
            background: #0f172a;
            color: white;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <div class="container">

        <h1>คอร์สเรียนออนไลน์</h1>

        <div class="courses">

            @foreach($courses as $course)

            <div class="card">

                <img src="{{ asset('course_images/' . $course->photo) }}">

                <div class="card-body">

                    <div class="title">{{ $course->title }}</div>

                    <div class="desc">{{ $course->description }}</div>

                    <div class="price">{{ $course->price }} บาท</div>

                    <a class="btn" href="{{ route('course.show', $course->id) }}">
                        ดูรายละเอียด
                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</body>

</html>