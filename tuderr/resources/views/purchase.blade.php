<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Complete Purchase</title>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Kanit', sans-serif;
background:#f4f4f4;
margin:0;
}

.container{
width:600px;
margin:10px auto;
}

.card{
background:white;
padding:30px;
border-radius:12px;
box-shadow:0 3px 10px rgba(0,0,0,0.15);
}

h1{
margin-bottom:25px;
font-weight:500;
}

.course-box{
background:#f5f5f5;
padding:20px;
border-radius:10px;
margin-bottom:25px;
}

.price{
font-size:20px;
color:#111;
font-weight:600;
}

.upload-box{
border:2px dashed #d4d4d4;
padding:40px;
text-align:center;
border-radius:10px;
margin-bottom:20px;
transition:0.2s;
}

.upload-box:hover{
border-color:#000;
}

.upload-icon{
font-size:40px;
color:#555;
margin-bottom:10px;
}

.upload-box p{
margin:5px 0;
color:#666;
font-size:14px;
}

.upload-box input{
margin-top:15px;
}

.buttons{
display:flex;
justify-content:space-between;
margin-top:10px;
}

.cancel{
background:#eee;
padding:12px 25px;
border:none;
border-radius:8px;
text-decoration:none;
color:#333;
transition:0.2s;
}

.cancel:hover{
background:#ddd;
}

.confirm{
background:#111;
color:white;
padding:12px 25px;
border:none;
border-radius:8px;
font-family:'Kanit', sans-serif;
cursor:pointer;
transition:0.2s;
}

.confirm:hover{
background:#000;
}

.upload-box input{
display:none;
}.upload-box input{
display:none;
}

</style>

</head>

<body>

@include('components.navbar')

<div class="container">

<div class="card">

<h1>ยืนยันการสั่งซื้อคอร์ส</h1>

<div class="course-box">

<p><b>คอร์ส:</b> {{ $course->title }}</p>

<p><b>ราคา:</b> <span class="price">{{ $course->price }} บาท</span></p>

</div>

<form action="/purchase/confirm" method="POST" enctype="multipart/form-data">

@csrf

<input type="hidden" name="course_id" value="{{ $course->id }}">

<h3>อัปโหลดสลิปการโอน</h3>

<div class="upload-box" onclick="document.getElementById('fileInput').click();">

<div class="upload-icon">
<ion-icon name="cloud-upload-outline"></ion-icon>
</div>

<p>อัปโหลดหลักฐานการชำระเงิน</p>

<input type="file" name="payment_slip" id="fileInput" accept="image/*" required>

<p id="fileName" style="margin-top:10px;color:#555;font-size:14px;"></p>

<img id="previewImage" style="display:none;margin-top:15px;max-width:200px;border-radius:8px;">

</div>

<div class="buttons">

<a href="/" class="cancel">ยกเลิก</a>

<button class="confirm">ยืนยันการสั่งซื้อ</button>

</div>

</form>

</div>

</div>
<script>
const fileInput = document.getElementById("fileInput");
const fileName = document.getElementById("fileName");
const previewImage = document.getElementById("previewImage");

fileInput.addEventListener("change", function(){

if(this.files && this.files[0]){

fileName.textContent = this.files[0].name;

const reader = new FileReader();

reader.onload = function(e){
previewImage.src = e.target.result;
previewImage.style.display = "block";
}

reader.readAsDataURL(this.files[0]);

}

});
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>