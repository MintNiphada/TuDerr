<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            flex: 1;
            padding: 25px;
            border-radius: 12px;
            color: white;
        }

        .blue {
            background: #e0ecff;
            color: #1e3a8a;
        }

        .green {
            background: #dcfce7;
            color: #166534;
        }

        .orange {
            background: #fff7ed;
            color: #9a3412;
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
        }

        .card h1 {
            margin-top: 10px;
            font-size: 32px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f7f7f7;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .pending {
            background: #ffe7d0;
            color: #d66a00;
        }

        .approved {
            background: #d4f5e1;
            color: #1a8f5a;
        }

        .view-btn {
            background: #e8f0ff;
            color: #4a6cf7;
            padding: 7px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .view-btn:hover {
            background: #dce7ff;
        }
    </style>

</head>

<body>
    @include('components.admin-sidebar')
    <div style="margin-left:260px; padding:40px;">
        <h1>ภาพรวมระบบ</h1>

        <div class="cards">

            <div class="card blue">
                <h3>จำนวนผู้ใช้ทั้งหมด</h3>
                <h1>{{ $totalUsers }}</h1>
            </div>

            <div class="card green">
                <h3>จำนวนคอร์สทั้งหมด</h3>
                <h1>{{ $totalCourses }}</h1>
            </div>

            <div class="card orange">
                <h3>การชำระเงินที่รอดำเนินการ</h3>
                <h1>{{ $pendingPayments }}</h1>
            </div>

        </div>

        <h2>รายการอนุมัติการชำระเงิน</h2>

        <table>

            <tr>
                <th>ผู้ใช้</th>
                <th>คอร์ส</th>
                <th>สถานะ</th>
                <th>การดำเนินการ</th>
            </tr>

            @foreach($payments as $p)

            <tr>

                <td>{{ $p->user->name }}</td>

                <td>คอร์ส {{ $p->course->title }}</td>


                <td>

                    @if($p->status == 'pending')
                    <span class="status pending">รอดำเนินการ</span>
                    @elseif($p->status == 'approved')
                    <span class="status approved">อนุมัติ</span>
                    @else
                    <span class="status">ปฏิเสธ</span>
                    @endif

                </td>

                <td>

                    <a class="view-btn" href="{{ route('admin.payment.show', $p->id) }}">
                        ดูรายละเอียด
                    </a>

                </td>

            </tr>

            @endforeach

        </table>

</body>

</html>