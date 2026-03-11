<!DOCTYPE html>
<html>

<head>
    <title>Payment Detail</title>

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .slip {
            text-align: center;
            margin-top: 15px;
        }

        .slip img {
            width: 300px;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        button {
            padding: 10px 18px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .approve {
            background: #e0f2fe;
            color: #0369a1;
        }

        .reject {
            background: #f1f5f9;
            color: #475569;
        }

        .approve:hover {
            background: #bae6fd;
        }

        .reject:hover {
            background: #e2e8f0;
        }

        button:hover {
            opacity: 0.85;
        }

        /* Preview Modal */

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
        }

        .close {
            position: absolute;
            top: 16px;
            right: 20px;
            font-size: 28px;
            color: #fff;
            cursor: pointer;
            opacity: 0.7;
            transition: 0.2s;
        }

        .close:hover {
            opacity: 1;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 80%;
            max-height: 80%;
            border-radius: 10px;
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
    </style>

</head>

<body>

    <div class="container">

        <div class="card">
            <a href="/" class="back-btn">
            < กลับ</a>

            <h1>รายละเอียดคำสั่งซื้อ</h1>

            <p><b>ชื่อคอร์ส :</b> {{ $payment->course->title }}</p>
            <p><b>ชื่อผู้ซื้อ :</b> {{ $payment->user->name }}</p>
            <p><b>จำนวนเงิน :</b> {{ $payment->amount }} บาท</p>
            <p><b>วันที่ชำระเงิน :</b> {{ $payment->created_at }}</p>
            <p><b>สถานะ :</b> {{ $payment->status }}</p>
            
            <h3>หลักฐานการชำระเงิน</h3>
            <div class="slip">
                <img src="/payment_slips/{{ $payment->slip_photo }}" onclick="openPreview(this.src)">
            </div>
            @if ($payment_approved)
                <p><b>สถานะการอนุมัติ :</b> @if($payment_approved->status === 'approved') อนุมัติ @else ปฏิเสธ @endif</p>
                <p><b>ผู้อนุมัติ :</b> {{ $payment_approved->user->name }}</p>
                <p><b>วันที่อนุมัติ :</b> {{ $payment_approved->approved_date }}</p>
                <p><b>หมายเหตุ :</b> {{ $payment_approved->remarks }}</p>
            @else

                <div class="buttons-wrapper">

                <form action="{{ route('admin.payment.update', $payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div style="margin-top:20px;">
                        <label><b>หมายเหตุ (Remark)</b></label><br>
                        <textarea name="remark" rows="3" style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;"></textarea>
                    </div>

                    <div class="buttons">

                        <button type="submit" name="status" value="approved" class="approve">
                            อนุมัติ
                        </button>

                        <button type="submit" name="status" value="rejected" class="reject">
                            ปฏิเสธ
                        </button>

                    </div>

                </form>


                </div>
            @endif

        </div>

    </div>

    <div id="previewModal" class="modal">
        <span class="close" onclick="closePreview()">×</span>
        <img id="previewImg">

    </div>

    <script>
        function openPreview(src) {
            document.getElementById("previewModal").style.display = "flex";
            document.getElementById("previewImg").src = src;
        }

        function closePreview() {
            document.getElementById("previewModal").style.display = "none";
        }
    </script>

</body>

</html>