<!-- Main header -->
<header class="header">
    <nav class="navbar">
        <a href="#" class="nav-logo">Placement Portal</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Dashboard</a>
            </li>

            <li class="nav-item">
                <a href="postnotice.php" class="nav-link">Post Notice</a>
            </li>
            <li class="nav-item">
                <a href="database.php" class="nav-link">Database</a>
            </li>
            <li class="nav-item">
                <a href="placed.php" class="nav-link">Placed Students</a>
            </li>
            <li class="nav-item">
                <a href="../logout.php" class="nav-link">Log Out</a>
            </li>
        </ul>

        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>

<!-- Css code-->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        font-size: 62.5%;
        font-family: 'Roboto', sans-serif;
    }

    li {
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    .header {
        border-bottom: 1px solid #E2E8F0;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 1.5rem;
        background-color: #2d2a2e;
    }

    .hamburger {
        display: none;
    }

    .bar {
        display: block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        background-color: #101010;

    }

    .nav-menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-item {
        margin-left: 5rem;
    }

    .nav-link {
        font-size: 1.6rem;
        font-weight: 400;
        color: #b3c6e0;
    }

    .nav-link:hover {
        color: #482ff7;
    }

    .nav-logo {
        font-size: 2.1rem;
        font-weight: 500;
        color: #d0cce9;
    }

    @media only screen and (max-width: 768px) {
        .nav-menu {
            position: fixed;
            left: -100%;
            top: 5rem;
            flex-direction: column;
            background-color: #0b0606;
            /* background-color: #482ff7; */
            width: 100%;
            border-radius: 10px;
            text-align: center;
            transition: 0.3s;
            box-shadow:
                0 10px 27px rgba(0, 0, 0, 0.05);
            z-index: 10;

        }

        .nav-menu.active {
            left: 0;
        }

        .nav-item {
            margin: 2.5rem 0;
        }

        .hamburger {
            display: block;
            cursor: pointer;
        }

    }

    // Inside the Media Query.

    .hamburger.active .bar:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active .bar:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .hamburger.active .bar:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
</style>

<!-- js files-->

<script>
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
</script>