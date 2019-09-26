<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <h1>Calculator</h1>
   <form method="post" action="<?php echo base_url('cal/calculate') ?>">
   	 First value: <input type="number" name="first" value="$first">
   	 Second value: <input type="number" name="second" value="$second">
   	 <button type="submit" value="add" name="add">Addition</button>
   	 <button type="submit" value="sub" name="sub">Subtraction</button>
   	 <button type="submit" value="mul" name="mul">Multiply</button>
   	 <button type="submit" value="div" name="div">Divide</button>
   </form>
</body>
</html>


