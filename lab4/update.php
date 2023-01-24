<?php


$id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('data.xml');

$tasks = $dom->getElementsByTagName('tasks')->item(0);
$task = $tasks->getElementsByTagName('task');

if (isset($_POST['okay'])) {
    $name = $_POST['name'];

    $time = $_POST['time'];
    $new_task = $dom->createElement('task');

    $st_id = $dom->createElement('id', $id);
    $new_task->appendChild($st_id);

    $st_name = $dom->createElement('name', $name);
    $new_task->appendChild($st_name);


    $st_isu = $dom->createElement('time', $time);
    $new_task->appendChild($st_isu);
    $i = 0;
    while (is_object($task->item($i++))) {
        $std = $task->item($i - 1)->getElementsByTagName('id')->item(0);
        $std_id = $std->nodeValue;
        if ($std_id == $id) {
            $tasks->replaceChild($new_task, $task->item($i - 1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('data.xml') or die('Error');
    header('location: index.php?page_layout=list');
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="container-fluid">

    <div>
        <h2>Edit a Task</h2>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="name">Task</label>
                <input type="text" name="name" class="form-control" required placeholder="task">
            </div>
            <div class="form-item">
                <label id="time" for="time">Time</label>
                <input name="time" class="form-control" required placeholder="time">
            </div>
            <button name="okay" class="btn btn-success" type="submit">Save</button>
        </form>
    </div>

</div>
</body>
</html>