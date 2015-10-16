    <?php
    include './_configuration/GroveAppConfig.php';
    include './_classes/clock.php';
    include './_classes/DatabaseManipulation.php';
    include './functions/GroveApp.php';

        $groovapp = new GroveApp();

        $email =$_POST['email'];
        $password = $_POST['password'];

        $groovapp->Get_user($email,$password);
