laravel Team project 4
======================

##실행방법

1. .env파일에 db설정
2. 마이그레이션
    - php artisan migrate
3. (선택) seed로 qna 더미파일 생성 -> 추후 db더미파일을 활용하는 방도 고려
    - php .\artisan db:seed --class=UsersTableSeeder  
    - php .\artisan db:seed --class=QuestionsTableSeeder
    - php .\artisan db:seed --class=CommentsTableSeeder 