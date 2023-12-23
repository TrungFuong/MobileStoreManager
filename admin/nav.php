<nav>
    <div id="logo">DWG</div>
    <a href="adminPage.php">
        <span class="fa fas fa-upload"></span>
        <span class="label">Add</span>
    </a>
    <a href='adminPage_del.php'>
        <spam class="fa fas fa-tools"></spam>
        <span class="label">Edit</span>
    </a>
    <form action="../auth/logout.php" method="POST">
        <a>
            <span style="color:white" class="fa fas fa-sign-out-alt"></span>
            <button name="submit" type="submit" class="label" style="background: transparent;border: none;color: white;position: relative;left:-0.4em;">Log Off</button>
        </a>
    </form>
</nav>