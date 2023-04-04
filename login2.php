<!DOCTYPE html>
<html lang="en">
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
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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
    <div class="message <?php echo isset($result) && $result->num_rows > 0 ? 'success' : 'error' ?>">
      <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>로그인 성공하였습니다!!</h2>
      <?php else: ?>
        <h2>아이디나 비밀번호가 올바르지 않습니다.</h2>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
