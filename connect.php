<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/tornike.css"> -->
    <?php
    ?>
    <link rel="stylesheet" href="../../css/tornike.css"/>
    <link rel="stylesheet" href="css/tornike.css"/>
</head>
<body>
    <div class="connectWrapper">
        <div class="previousPage">
            <button onclick="history.back()">
                <ion-icon name="return-down-back-outline"></ion-icon>
                Previous Page
            </button>
        </div>
        <div class="logIn">
            <h1>Log in</h1>
            <form action="controller_login.php" method="post">
                  <input type="email" placeholder="Enter Email" name="mail_utilisateur" required>
                  <input type="password" placeholder="Enter Password" name="mdp_utilisateur" required>
            
                  <button type="submit" id="logIn">Login</button>
              </form>
        </div>
        <div class="signUp">
            <h1>Sign up</h1>
            <form action="controller_signUp.php" method="post">
                <input type="text" placeholder="Enter Username" name="pseudo_utilisateur" required>
                <input type="email" placeholder="Enter Email" name="mail_utilisateur" required>
                <input type="password" placeholder="Enter Password" name="mdp_utilisateur" required>
                <input type="password" placeholder="Confirm Password" name="mdp_utilisateurVerif" required>
                <button type="submit" id="signUp">Sign up</button>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./js/tornike.js"></script>
</body>
</html>