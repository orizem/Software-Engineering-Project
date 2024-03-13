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
          <li><button><a href="../delivery.html">הזמנות</a></button></li>
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
  <!-- TODO: Remove the entire div below -->
  <div class="index-div container content">
    <span class="box content" style="background-color: rgba(24, 41, 49, 0.4);">
      <span style="background-color: red; color:yellow;width:85%;">
        <ul>
          &#9888;:TODO:&#9888;
          <li>
            <p>
              באחד הדפים חייב להיות טופס, אשר שליחתו תהיה למייל שלכם. בטופס חייבים להיות לפחות 3 פקדי
              input ואת כל סוגי הפקדים ממצגת 1 שקופיות 91-100:
            </p>
            <ol title="Delivery">select</ol>
            <ol class="added">button</ol>
            <ol title="Register" class="added">password</ol>
            <ol title="Register" class="added">email</ol>
            <ol>url</ol>
            <ol title="Register" class="added">tel</ol>
            <ol title="Delivery">number</ol>
            <ol title="Delivery">range</ol>
            <ol>color</ol>
            <ol title="Register" class="added">date</ol>
            <ol>time</ol>
            <ol title="Delivery">datetime</ol>
            <ol title="Delivery">text area</ol>
            <ol title="Delivery">file upload</ol>
            <ol title="Delivery">date list</ol>
          </li><br>
          <li>
            <p>
              חייב להשתמש באתר בכל סוגי הפלט כפי שהם
              מוצגים ב מצגת 1 שקופית 146:
            </p>
            <ol>כתיבה לתיבת התראה ()window.alert</ol>
            <ol>כתיבה לפלט של document.write() HTML</ol>
            <ol class="added">כתיבה לאלמנט של HTML שימוש ב innerHTML</ol>
          </li><br>
          <li>חייב להשתמש פעם אחת לפחות באינטראקציה עם המשתמש (מצגת 1 שקופית 161) - window.prompt</li><br>
          <li>שימוש במערך פעם אחת לפחות ובמחרוזת פעם אחת לפחות</li><br>
          <li></li><br>
          <li></li>
        </ul>
      </span>
    </span>
  </div>
  <script src="../scripts/loginOrRegister.js"></script>
</body>