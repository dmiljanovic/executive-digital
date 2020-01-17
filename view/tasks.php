<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <title>Executive Digital</title>
</head>
<body>

<?php
if(!\App\Helpers\Session::GetKey('userId') && !\App\Helpers\Session::GetKey('userEmail')) {
    die("Unauthorized user");
}
?>

<div class="container">
    <?php include '_header.php'?>
    <div class="row">
        <div class="col-lg-6 mt-5">
            <h5>Tasks</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <a class="btn btn-success" href="task" role="button">New Task</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Discription</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Blocked</th>
                    <th scope="col">Column</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $task) { ?>
                        <tr>
                            <td><?php echo $task['title'] ?></td>
                            <td><?php echo $task['description'] ?></td>
                            <td><?php echo $task['due_date'] ?></td>
                            <td><?php echo $task['blocked'] ? 'Yes' : 'No' ?></td>
                            <td><?php echo $task['col'] ?></td>
                            <td>
                                <a class="btn btn-secondary" href="/task/<?php echo $task['id'] ?>/edit" role="button">Edit</a>
                                <a class="btn btn-info" href="/task/<?php echo $task['id'] ?>/view" role="button">View</a>
                                <a class="btn btn-danger" href="/task/<?php echo $task['id'] ?>/delete" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {}
</script>
</body>
</html>