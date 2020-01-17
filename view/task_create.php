<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <title>Executive Digital</title>
</head>
<body>
<div class="container">
    <?php include '_header.php'?>
    <div class="row">
        <div class="col-lg-6 mt-5">
            <h5>New Task</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-2">
            <a class="btn btn-danger float-right" href="../../tasks" role="button">Cancel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-2">
            <form name="task_create" action="/task_create" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">Description</textarea>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input id="due_date" name="due_date">
                </div>
                <div class="form-group">
                    <label for="col">Column</label>
                    <select id="col" name="col" class="custom-select">
                        <option selected>Please select...</option>
                        <option value="backlog">Backlog</option>
                        <option value="in_progress">In Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="blocked" name="blocked">
                    <label class="custom-control-label" for="blocked">Blocked</label>
                </div>
                <button type="submit" name="btn_create_task" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#due_date').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $(function() {
            $("form[name='task_create']").validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 3
                    },
                    description: {
                        required: true,
                        minlength: 15
                    },
                    due_date: {
                        required: true,
                        date: true
                    },
                    col: {
                        required: true
                    }
                }
            });
        });
    })
</script>
</body>
</html>
