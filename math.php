<?php
$link = mysqli_connect("localhost", "root", "", "demo");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// Escape user inputs for security
$firstNo = $_POST['firstNo'];
$secNo = $_POST['secNo'];
$operan = $_POST['operan'];
$answer = $_POST['answer'];
$start_1 = $_POST["start_1"];
$end_1 = $_POST["end_1"];
$start_2 = $_POST["start_2"];
$end_2 = $_POST["end_2"];

session_start();

$_SESSION["firstNo"] = $firstNo;
$_SESSION["secNo"] = $secNo;
$_SESSION["operand"] = $operan;
$_SESSION["answer"] = $answer;
$_SESSION["start_1"] = $start_1;
$_SESSION["end_1"] = $end_1;
$_SESSION["start_2"] = $start_2;
$_SESSION["end_2"] = $end_2;

$correct = 1;


if($operan == "add"){
  $res = $firstNo + $secNo;
  $op = "+";
}elseif ($operan == "minus") {
  echo "MINUS"."\n";
  $res = $firstNo - $secNo;
  $op = "-";
}elseif ($operan == "divide") {
  $res = (round(($firstNo / $secNo), 2));
  $op = "/";
}elseif ($operan == "multiply") {
  $res = $firstNo * $secNo;
  $op = "*";
}

if($res != $answer){
  $correct = 0;
  echo "YOU GOT IT WRONG!"."\n";
}

if ($stmt = mysqli_prepare($link,
"INSERT INTO answers (first_digit, second_digit, operand, answer, correct)
  VALUES (?,?,?,?,?);")){
  mysqli_stmt_bind_param($stmt,"iisii", $firstNo,$secNo,$op,$answer,$correct);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

if ($stmt = mysqli_prepare($link,
  "SELECT COUNT(*) FROM answers;")){
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $totalAll);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
}

if ($stmt = mysqli_prepare($link,
  "SELECT COUNT(*) FROM answers WHERE correct =1;")){
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $totalCorrect);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
}

mysqli_close($link);

echo <<< "Result"
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Math Practice</title>
  </head>
  <body>
  <form action="math.php" method="POST">
    <h3>First Number Between....</h3>
    <p>
        <label for="start_1">Start:</label>
        <input type="number" name="start_1" id="start_1" value=$start_1>

        <label for="end_1">End</label>
        <input type="number" name="end_1" id="end_1" value=$end_1>
    </p>
    <h3>Second Number Between.....</h3>
    <p>
        <label for="start_2">Start:</label>
        <input type="number" name="start_2" id="start_2" value=$start_2>

        <label for="end_2">End</label>
        <input type="number" name="end_2" id="end_2" value=$end_2>
    </p>
    <button type="button" id="getNums">pick nums</button>

    <label for="firstNo">First #</label>
    <input type="number" name="firstNo" id="firstNo" value=$firstNo>
    <label for="secNo">Second #</label>
    <input type="number" name="secNo" id="secNo" value=$secNo>

    <h3>Choose operand</h3>
      <p>
        <select id="operand" name="operan">
          <option value="add">add</option>
          <option value="minus">minus</option>
          <option value="multiply">multiply</option>
          <option value="divide">divide</option>
        </select>
      </p>

      <p>
          <label for="answer">Answer:</label>
          <input type="number" name="answer" id="answer" value=$answer>
      </p>
      <h3>Actual : $res</h3>
      <input type="submit" value="Compute">
</form>

<h4>Total Correct: $totalCorrect</h4>
<h4>Total Tries: $totalAll</h4>

<script type="text/javascript">
function downloadJSAtOnload() {
var element = document.createElement("script");
element.src = "numbers.js";
document.body.appendChild(element);
}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;
</script>

  </body>
</html>
Result;

?>
