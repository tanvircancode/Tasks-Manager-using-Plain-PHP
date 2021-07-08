<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo/Tasks</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <style>
        body {
            margin-top: 30px;
        }

        #main {
            padding: 0px 150px 0px 150px;;
        }

        #action {
            width: 150px;
        }
    </style>
</head>
<body>
<div class="container" id="main">
    <h1>Tasks Manager</h1>
    <p>This is a sample project for managing our daily tasks. We're going to use HTML, CSS, PHP, JavaScript and MySQL
        for this project</p>


        <h4>Complete Tasks</h4>
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Task</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><input class="label-inline" type="checkbox" value=""></td>
                    <td><?php echo $cdata['id'] ?></td>
                    <td><?php echo $cdata['task']; ?></td>
                    <td><?php echo $cdate; ?></td>
                    <td><a class="delete" data-taskid="" href='#'>Delete</a> | <a
                                class="incomplete" data-taskid="" href='#'>Mark Incomplete</a>
                    </td>
                </tr>
				<?php

			?>
            </tbody>
        </table>
        <p>...</p>




        <p>No Task Found</p>

        <h4>Upcoming Tasks</h4>
        <form action="tasks.php" method="POST">
            <table>
                <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><input name="taskids[]" class="label-inline" type="checkbox" value=""></td>
                        <td></td>
                        <td>></td>
                        <td></td>
                        <td><a class="delete" data-taskid="" href='#'>Delete</a> | <a
                                    class="complete" data-taskid="" href='#'>Complete</a></td>
                    </tr>

                </tbody>
            </table>
            <select id="action" name="action" >
                <option value="0">With Selected</option>
                <option value="bulkdelete">Delete</option>
                <option value="bulkcomplete">Mark As Complete</option>
            </select>
            <input class="button-primary" id="bulksubmit" type="submit" value="Submit">
        </form>

    <p>...</p>
    <h4>Add Tasks</h4>
    <form method="post" action="">
        <fieldset>

            <label for="task">Task</label>
            <input type="text" placeholder="Task Details" id="task" name="task">
            <label for="date">Date</label>
            <input type="text" placeholder="Task Date" id="date" name="date">

            <input class="button-primary" type="submit" value="Add Task">
            <input type="hidden" name="action" value="add">
        </fieldset>
    </form>
</div>

<form action="tasks.php" method="post" id="completeform">
    <input type="hidden" name="action" value="complete">
    <input type="hidden" id="taskid" name="taskid">
</form>

<form action="tasks.php" method="post" id="deleteform">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" id="dtaskid" name="taskid">
</form>

<form action="tasks.php" method="post" id="incompleteform">
    <input type="hidden" name="action" value="incomplete">
    <input type="hidden" id="itaskid" name="taskid">
</form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script>
    ;(function ($) {
        $(document).ready(function () {
            $(".complete").on('click', function () {
                var id = $(this).data("taskid");
                $("#taskid").val(id);
                $("#completeform").submit();
            });

            $(".delete").on('click', function () {
                if (confirm("Are you sure to delete this task?")) {
                    var id = $(this).data("taskid");
                    $("#dtaskid").val(id);
                    $("#deleteform").submit();
                }
            });

            $(".incomplete").on('click', function () {
                var id = $(this).data("taskid");
                $("#itaskid").val(id);
                $("#incompleteform").submit();
            });

            $("#bulksubmit").on("click",function(){
                if($("#action").val()=='bulkdelete'){
                    if(!confirm("Are you sure to delete?")){
                        return false;
                    }
                }
            })
        });
    })(jQuery);
</script>
</html>