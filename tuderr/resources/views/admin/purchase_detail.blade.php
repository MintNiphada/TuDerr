<!DOCTYPE html>
<html>
<head>
<title>Purchase Detail</title>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body{
font-family:'Kanit', sans-serif;
background:#f4f6f9;
margin:0;
padding:40px;
}

.container{
max-width:800px;
margin:auto;
}

.card{
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.slip{
text-align:center;
margin-top:15px;
}

.slip img{
width:300px;
border-radius:10px;
cursor:pointer;
box-shadow:0 3px 10px rgba(0,0,0,0.2);
}

.buttons{
margin-top:30px;
display:flex;
justify-content:flex-end;
gap:10px;
}

button{
padding:10px 18px;
border-radius:6px;
border:none;
font-size:14px;
cursor:pointer;
}

.approve{
background:#e0f2fe;
color:#0369a1;
}

.reject{
background:#f1f5f9;
color:#475569;
}

.approve:hover{
background:#bae6fd;
}

.reject:hover{
background:#e2e8f0;
}

button:hover{
opacity:0.85;
}

/* Preview Modal */

.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.7);
justify-content:center;
align-items:center;
}

.modal img{
max-width:80%;
max-height:80%;
border-radius:10px;
}

.close{
position:absolute;
top:16px;
right:20px;
font-size:28px;
color:#fff;
cursor:pointer;
opacity:0.7;
transition:0.2s;
}

.close:hover{
opacity:1;
}

.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.8);
justify-content:center;
align-items:center;
}

.modal img{
max-width:80%;
max-height:80%;
border-radius:10px;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<h1>รายละเอียดคำสั่งซื้อ</h1>

<p><b>รหัสคอร์ส :</b> {{ $purchase->course_id }}</p>
<p><b>สถานะ :</b> {{ $purchase->status }}</p>

<h3>หลักฐานการชำระเงิน</h3>

<div class="slip">
<img src="/payment_slips/{{ $purchase->payment_slip }}" onclick="openPreview(this.src)">
</div>

<div class="buttons">

<form action="/admin/approve/{{ $purchase->id }}" method="POST">
@csrf
<button class="approve">อนุมัติ</button>
</form>

<form action="/admin/reject/{{ $purchase->id }}" method="POST">
@csrf
<button class="reject">ปฏิเสธ</button>
</form>

</div>

</div>

</div>

<div id="previewModal" class="modal">
<span class="close" onclick="closePreview()">×</span>
<img id="previewImg">

</div>

<script>

function openPreview(src){
document.getElementById("previewModal").style.display="flex";
document.getElementById("previewImg").src=src;
}

function closePreview(){
document.getElementById("previewModal").style.display="none";
}

</script>

</body>
</html>