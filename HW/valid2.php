<?php
/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 16:11
 */

class User
{
    public static $users = [];

    public function load(int $id)
    {
        # если идентификатор уже существует (пользователь), то исключение
        if (array_key_exists($id, self::$users)) {
            throw new Exception('ID ' . $id . ' already exists!');
        }
    }

    public function save(array $data)
    {
        # сохраняем в "базе" и возвращаем случайное значение
        self::$users[$data['id']] = $data;
        return (int)rand(0, 1);
    }

}

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
        return true;
    }
}


$success = false;

$user = new User();

$user->save(['id' => 1, 'name' => 'ad']);
$user->save(['id' => 13, 'name' => 'pa']);

if (!empty($_POST)) {
    try {
        $user->load($_POST['id']);

        $success = (new UserFormValidation())->validate($_POST);
        $user->save($_POST);

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

echo "<pre>";
var_dump($user::$users);
echo "</pre>";
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
    <input type="number" min="1" max="100" step="1" name="id" id="id" placeholder="Enter your ID">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="number" min="0" max="100" step="1" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="email" id="email" placeholder="Enter your email">
    <input type="submit" value="Send">
</form>

</body>

</html>
