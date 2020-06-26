<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h2>Это форма обратной связи</h2>
    <?php
        require_once "form.php";
        $form1 = new form("form1");
    if(isset($_REQUEST["already_seen"]))
    {
        $form1 -> validate();
        if(count($errors)>0)
        {
            $form1 -> show_error();
            $form1 -> show();
        }
        else{
            setcookie("LogCookie", $_POST['log']);
            setcookie("PassCookie", $_POST['pass']);
            setcookie("EmailCookie", $_POST['email']);
            echo $form1->button_exit;
        }
    }else{
        $form1 -> show();
    }

    $form1->click_button_exit();

    ?>
</body>
</html>