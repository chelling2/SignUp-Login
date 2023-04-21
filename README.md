# 회원가입 및 로그인 하는 페이지 

로그인 폼

![1](https://user-images.githubusercontent.com/114050357/229791264-3bb4a5d7-dd3c-4e4a-9fb3-690dc1d2520c.JPG)

회원가입 폼

![2](https://user-images.githubusercontent.com/114050357/229791383-72955081-db83-45f4-a3ab-507ed541a304.JPG)

로그인 성공 시

![3](https://user-images.githubusercontent.com/114050357/229791466-05749337-92c3-493e-9052-1079482df5f4.JPG)

로그인 실패 

![4](https://user-images.githubusercontent.com/114050357/229791563-efbc7840-d87a-421e-8abf-02a3df268928.JPG)


sql 질의문 작성

CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL
); 
