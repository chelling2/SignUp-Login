<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <style>
      body {
        background-color: white;
        font-family: Arial, sans-serif;
      }

      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 100px;
      }

      .message {
        background-color: white;
        border: 1px solid greenyellow;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
      }

      .success {
        color: black;
        background-color: yellowgreen;
        border-color: yellow;
      }

      .error {
        color: black;
        background-color: yellowgreen;
        border-color: yellow;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <?php
        // 데이터베이스 연결
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "users";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        mysqli_set_charset($conn, "utf8");

        // 폼 데이터 수집 및 쿼리 작성
        $name = mysqli_real_escape_string($conn, $_POST['name'] ?? '');
        $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
        $passwd = mysqli_real_escape_string($conn, $_POST['passwd'] ?? '');
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? AND email = ? AND password = ?");
        if ($stmt === false) {
          die("Error: " . mysqli_error($conn));
        }
        $stmt->bind_param('sss', $name, $email, $passwd);

        // 쿼리 실행 및 결과 처리
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
          // 로그인 성공
          echo '<div class="message success">로그인에 성공하였습니다!</div>';
        } else {
          // 로그인 실패
          echo '<div class="message error">아이디나 비밀번호가 올바르지 않습니다.</div>';
        }

        // 데이터베이스 연결 종료
        $stmt->close();
        $conn->close();
      ?>
    </div>
  </body>
</html>
