
<form method="POST">
    Number1: <input type="number" name="a">
    Number2: <input type="number" name="b">
    Operation:
    <select name="op">
        <option>addition</option>
        <option>subtraction</option>
        <option>multiplication</option>
        <option>divison</option>
    </select>
    <button>Calculate</button>
</form>

<?php
if (!empty($_POST)) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $op = $_POST['op'];

    switch ($op) {
        case "addition": echo $a + $b; break;
        case "subtraction": echo $a - $b; break;
        case "multiplication": echo $a * $b; break;
        case "division": echo $b==0 ? "Cannot divide by zero" : $a/$b; break;
    }
}
?>