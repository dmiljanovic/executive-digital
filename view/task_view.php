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
<div class="container">
    <?php include '_header.php'?>
    <div class="row">
        <div class="col-lg-6 mt-5">
            <h5>View Task</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-">
            <a class="btn btn-danger float-right" href="../../tasks" role="button">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mt-5">
            <form id="target">
                <input type="hidden" name="id" id="id" value="<?php echo $data->id ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $data->title ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $data->description ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="text" class="form-control" name="due_date" id="due_date" value="<?php echo $data->due_date ?>">
                </div>
                <div class="form-group">
                    <label for="col">Column</label>
                    <select id="col" name="col" class="custom-select">
                        <option <?php if($data->col == "backlog") echo 'selected="selected"' ?> value="backlog">Backlog</option>
                        <option <?php if($data->col == "in_progress") echo 'selected="selected"' ?> value="in_progress">In Progress</option>
                        <option <?php if($data->col == "done") echo 'selected="selected"' ?> value="done">Done</option>
                    </select>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="blocked" name="blocked" <?php if($data->blocked) echo 'checked="checked"' ?>>
                    <label class="custom-control-label" for="blocked">Blocked</label>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $("#target :input").prop("disabled", true);
    })
</script>
</body>
</html>
