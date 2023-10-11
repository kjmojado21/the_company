<!-- 
    create UI
    create display Users method inside User.php
 -->
<?php
include 'layouts/header.html';
include '../classes/User.php';
$user = new User;

session_start();

$all_users = $user->displayUsers();

?>

<div class="container">
    <table class="table mt-5 table-bordered ">
        <thead class="table-dark">
            <th></th>
            <th>NAME</th>
            <th>LAST NAME</th>
            <th>USERNAME</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach ($all_users as $user) : ?>
                <tr>
                    <td> <i class="fa-solid fa-circle-user"></i> </td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td>
                        <?php if ($_SESSION['id'] == $user['id']) : ?>
                            <a href="#" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>





<?php include 'layouts/footer.html' ?>