laravel Team project 4
======================

## 실행방법

1. .env파일에 db설정
2. 마이그레이션
    - php artisan migrate
3. (선택) seed로 qna 더미파일 생성 -> 추후 db더미파일을 활용하는 방도 고려
    - php .\artisan db:seed --class=UsersTableSeeder  
    - php .\artisan db:seed --class=QuestionsTableSeeder
    - php .\artisan db:seed --class=CommentsTableSeeder 


## Q&A 기능 설명
    1. 관리자(admin)
        모든 질문과 댓글 수정 및 삭제 가능
    2. 로그인
        질문 및 댓글 등록 가능
        자신이 등록한 질문 및 댓글은 수정 및 삭제 가능
    3. guest
        질문 및 댓글 읽기만 가능
## 규칙

 - 관리자 기능 사용시 name을 admin으로 만들어야 함