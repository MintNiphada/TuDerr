<style>
    .sidebar {
        width: 240px;
        height: 100vh;
        background: #efefef;
        padding: 30px 20px;
        position: fixed;
        left: 0;
        top: 0;
    }

    .logo {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        margin-bottom: 10px;
        border-radius: 10px;
        text-decoration: none;
        color: #111;
        font-size: 16px;
    }

    .menu a:hover {
        background: #ddd;
    }

    .menu .active {
        background: #ddd;
    }
</style>

<div class="sidebar">

    <div class="logo">
        TuDerr Admin
    </div>

    <div class="menu">

        <a href="{{ route('admin.dashboard') }}" class="active">
            แดชบอร์ด
        </a>
        <!--กดไม่ไปเด้ออ -->
        <a href="#">
            ผู้ใช้งาน
        </a>

        <a href="#">
            คอร์สเรียน
        </a>

        <a href="#">
            การชำระเงิน
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                {{ __('ออกจากระบบ') }}
            </button>
        </form>

    </div>

</div>