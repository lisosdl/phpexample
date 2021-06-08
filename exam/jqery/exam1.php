<!DCOTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	$(function() {
		// $("li").first().css("background", "red");
		// $("li").last().css("background", "blue");
		// $("li").eq(3).css("background", "red"); // li[3]
		
		$("li:lt(3)").css("background", "red");
		$("li:gt(3)").css("background", "blue");
	});
	</script>
</head>
<body>
	<ul>
		<li class='li1'>제목1</li><!-- 0번째 -->
		<li class='li2'>제목2</li><!-- 1번째 -->
		<li class='li3'>제목3</li><!-- 2번째 -->
		<li class='li4'>제목4</li><!-- 3번째 -->
		<li class='li5'>제목5</li><!-- 4번째 -->
		<li class='li6'>제목6</li><!-- 5번째 -->
		<li class='li7'>제목7</li><!-- 6번째 -->
		<li class='li8'>제목8</li><!-- 7번째 -->
		<li class='li9'>제목9</li><!-- 8번째 -->
		<li class='li10'>제목10</li><!-- 9번째 -->
	</ul>
</body>
</html>
