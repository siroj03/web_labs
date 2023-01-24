<?php
$dom = new DOMDocument();
$dom->load('data.xml');
$tasks = $dom->getElementsByTagName('tasks')->item(0);
$task = $tasks->getElementsByTagName('task');
$index = $task->length;
$id = $task[$index - 1]->getElementsByTagName('id')->item(0)->nodeValue + 1;

/**
 * @param DOMDocument $dom
 * @param $id
 * @return DOMElement|false
 * @throws DOMException
 */
function getF(DOMDocument $dom, $id)
{
    $name = $_POST['name'];

    $isu = $_POST['time'];
    $new_student = $dom->createElement('task');

    $st_id = $dom->createElement('id', $id);
    $new_student->appendChild($st_id);

    $st_name = $dom->createElement('name', $name);
    $new_student->appendChild($st_name);



    $st_isu = $dom->createElement('time', $isu);
    $new_student->appendChild($st_isu);
    return $new_student;
}

if (isset($_POST['okay'])) {
    $new_student = getF($dom, $id);

    $tasks->appendChild($new_student);

    $dom->formatOutput = true;
    $dom->save('data.xml') or die('Error');
    header('location: index.php?page_layout=list');
}
?>
<link rel="stylesheet" href="create.css">
<div>
    <div>
        <h2>Add a New task</h2>
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
            <button name="okay" class="btn btn-success" type="submit">Add</button>
        </form>
    </div>
</div>