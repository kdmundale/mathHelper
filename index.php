<?php
session_start();

if(isset($_SESSION)){
  $start_1 = 1;
  $end_1 = 3;
  $start_2 = 4;
  $end_2 = 6;
  $firstNo = 2;
  $secNo = 5;
  // $operan = "add";
  $answer = 0;
} else {
  $_SESSION["start_1"] = $start_1;
  $_SESSION["end_1"] = $end_1;
  $_SESSION["start_2"] = $start_2;
  $_SESSION["end_2"] = $end_2;
  $_SESSION["firstNo"] = $firstNo;
  $_SESSION["secNo"] = $secNo;
  $_SESSION["operan"] = $operan;
  $_SESSION["answer"] = $answer;
}


echo <<< "Page"
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
        <select id="operan" name="operan">
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
      <input type="submit" value="Compute">
</form>

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
Page;
?>
