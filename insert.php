<!DOCTYPE html>
<html>

<head>
	<title>회원가입</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		h1 {
			text-align: center;
			margin-top: 100px;
			margin-bottom: 50px;
			color: green;
		}

		form {
			background-color: orange;
			border-radius: 5px;
			padding: 20px;
			width: 600px;
			margin: 0 auto;
			border: 3px dotted greenyellow;
		}

		label {
			display: inline-block;
			width: 70px;
			font-weight: bold;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"] {
			padding: 10px;
			margin-bottom: 10px;
			width: 95%;
			border: 3px solid green;
			border-radius: 5px;

		}

		input[type="submit"] {
			background-color: pink;
			color: purple;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			cursor: pointer;
			border: 3px solid green;
		}
	</style>
</head>

<body>
	<h1>회원가입</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>이름</label>
		<input type="text" name="name" required><br><br>
		<label>이메일</label>
		<input type="email" name="email" required><br><br>
		<label>패스워드</label>
		<input type="password" name="passwd" required><br><br>
		<input type="submit" value="가입">
	</form>
	<?php
	// 폼이 제출되면 회원 정보를 처리하는 코드
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 데이터베이스 연결
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "users";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// 이름과 이메일 데이터 가져오기
		$name = $_POST["name"];
		$email = $_POST["email"];
		$passwd = $_POST["passwd"];

		// SQL 쿼리 실행
		$sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$passwd')";
		if ($conn->query($sql) === TRUE) {
			echo "회원가입이 완료되었습니다.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	?>
</body>

</html>