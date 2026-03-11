<nav class="navbar">

    <div class="logo">TuDerr</div>

    <div class="menu">
        <a href="/">หน้าแรก</a>
        <a href="/mycourses">คอร์สของฉัน</a>
          
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                {{ __('ออกจากระบบ') }}
            </button>
        </form>


    </div>
</nav>

<style>
    .navbar {
        background: white;
        padding: 15px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
        font-size: 20px;
        font-weight: bold;
    }

    .menu a {
        margin-left: 20px;
        text-decoration: none;
        color: #333;
        transition: all 0.2s ease;
        padding-bottom: 3px;
    }

    .menu a:hover {
        color: #2563eb;
        border-bottom: 2px solid #2563eb;
    }
</style>