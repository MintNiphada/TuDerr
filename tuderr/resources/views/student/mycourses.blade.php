<!DOCTYPE html>
<html>
<head>
<title>My Courses</title>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Kanit', sans-serif;
background:#f4f6f9;
margin:0;
}

.container{
width:90%;
margin:auto;
padding:40px 0;
}

.courses{
display:flex;
gap:25px;
flex-wrap:wrap;
}

.card{
width:300px;
background:white;
border-radius:12px;
overflow:hidden;
box-shadow:0 3px 8px rgba(0,0,0,0.15);
}

.card img{
width:100%;
height:180px;
object-fit:cover;
}

.card-body{
padding:20px;
}

.title{
font-size:18px;
font-weight:bold;
margin-bottom:15px;
}

.btn{
display:block;
text-align:center;
background:#0a0a23;
color:white;
padding:12px;
border-radius:8px;
text-decoration:none;
}

</style>

</head>

<body>

@include('components.navbar')

<div class="container">

<h1>My Courses</h1>

<div class="courses">

<div class="card">

<img src="/course_images/laravel.jpg">

<div class="card-body">

<div class="title">Laravel Web Development</div>

<a href="#" class="btn">Continue Learning</a>

</div>

</div>

<div class="card">

<img src="/course_images/java.jpg">

<div class="card-body">

<div class="title">Java Programming</div>

<a href="#" class="btn">Continue Learning</a>

</div>

</div>

</div>

</div>

</body>
</html>