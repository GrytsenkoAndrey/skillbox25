<?php
/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 16:11
 */

class UserFormValidation
{
    public function validate(array $data)
    {
        if (empty($data['name'])) {
            throw new Exception('Empty name!');
        }
        if ($data['age'] < 18) {
            throw new Exception('Age is less than 18 year old!');
        }
        if (strpos($data['email'], '@') == 0) {
            throw new Exception('Email is wrong!');
        }
    }
}

$success = false;

if (!empty($_POST)) {
    try {
        $success = (new UserFormValidation())->validate($_POST);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>

<html>
<head>
    <title>Validation</title>
</head>
<body>

<?php if (!$success) { ?>
<h1><?= $error ?></h1>
<?php } ?>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="number" min="0" max="100" step="1" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="email" id="email" placeholder="Enter your email">
    <input type="submit" value="Send">
</form>

</body>

</html>
