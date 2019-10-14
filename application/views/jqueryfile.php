<!DOCTYPE html>
<html>
<head>
	<title>js</title>
	<script src="jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
</head>
<style> 
#div2, #div1 {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#div2 {
  padding: 50px;
  
}
</style>
<body>
<p id="test1">This is a paragraph.</p>
<p id="test2">This is another paragraph.</p>

<p>Input field: <input type="text" id="test3" value="tinu"></p>

<button id="btn1">Set Text</button>
<button id="btn2">Set HTML</button>
<button id="btn3">Set Value</button>


<p>Directory access is forbidden.</p>
<button>click Me</button><br><br>
<p>Name: <input type="text" id="test" value=""></p>

Email: <input type="text" name="email">


<div id="div1">click</div><br>
<div id="div2">this is jquery file</div><br>
<div id="div3" style="background:lightblue;height:100px;width:100px;position:absolute;"></div><br><br>


<script type="text/javascript"></script>
<script>
	$(document).ready(function(){
	  //$("button").click(function(){
	    //$("#div1").fadeTo("slow", 0.30);
	    //$("#div2").fadeTo("slow", 0.4);
	    //$("#div3").fadeTo("slow", 0.7);
	  //});
		//$("button").click(function(){
		    //alert("Value: " + $("#test").val());
		  //});

	  //$("button").click(function(){
	    //$("#div3").animate({
	      //left: '350px',
	      //height: 'toggle',
	      //width: '+=50px'
	    //});
	  //});
	  $("#btn1").click(function(){
	    $("#test1").text("Hello world!");
	  });
	  $("#btn2").click(function(){
	    $("#test2").html("<b>Hello world!</b>");
	  });
	  $("#btn3").click(function(){
	    $("#test3").val("Shweta Dadhich");
	  });

    });

</script>
</body>
</html>
