<?php

    include_once("templates/header.php");
    include_once("models/User.php");
    include_once("dao/UserDAO.php");

    $user = new User();
    $userDao = new UserDao($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);

    $fullName = $user->getFullName($userData);

?>

<?php

    include_once("templates/footer.php");

?>