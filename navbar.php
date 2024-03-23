<body>
  <link rel="stylesheet" href="../styles/navbar.css" />

  <div class="color-palette navbar-container">
    <div class="navbar">
      <div id="navbar-logo-div">
        <img id="navbar-logo" src="../images/logo.png" alt="logo" />
      </div>
      <ul class="buttons">
        <div id="navId">
          <li><button class="btn"><a href="../index.html">דף הבית</a></button></li>
          <li><button><a href="../menu.php">תפריט</a></button></li>
          <li><button><a href="../delivery.php">הזמנות</a></button></li>
          <li><button><a href="../info.html">המסעדה שלנו</a></button></li>
          <li><button><a href="../contact.html">צור קשר</a></button></li>
          <?php 
            // Password is correct, so start a new session
            session_start();

            // Already logged in
            if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {
                echo '<li><button><a href="../php/logout.php">יציאה</a></button></li>';
            }
            else {
              echo '<li><button><a href="../register.html">הרשמה</a></button></li>';
              echo '<li><button><a href="../login.html">כניסה</a></button></li>';
            }
          ?>
          
        </div>
      </ul>
    </div>
  </div>
</body>