laravel Team project 4
======================

## 실행방법

1. Composer 종속성 설치
    - composer install

2. NPM 종속성 설치
    - npm install
3. key 생성
    - php artisan key:generate     
4. env 파일의 복사본을 만듭니다
    - cp .env.example .env

5. .env 파일에서 Laravel이 데이터베이스에 연결할 수 있도록 데이터베이스 정보를 추가
    - php artisan migrate
6. (선택) seed로 qna 더미파일 생성 -> 추후 db더미파일을 활용하는 방도 고려
    - php .\artisan db:seed --class=UsersTableSeeder  
    - php .\artisan db:seed --class=QuestionsTableSeeder
    - php .\artisan db:seed --class=CommentsTableSeeder 


## Yajra 설치방법 및 경로설정
1. Yajra설치
    - composer require yajra/laravel-datatables-oracle

2. 경로추가
    -1. config/app.php 파일열기
    -2. 'providers' => [
        ............
        Yajra\Datatables\DatatablesServiceProvider::class,

    ],
    -3. 'aliasea' => [
        ........
        ''DataTables' => Yajra\DataTables\Facades\DataTables::class,
        ],
    -4. 수정 완료후 경로설정 명령어 입력.
    php artisan vendor:publish --provider=Yajra\DataTables\DataTablesServiceProvider
    


## Q&A 기능 설명
    1. 관리자(admin)
        모든 질문과 댓글 수정 및 삭제 가능
    2. 로그인
        질문 및 댓글 등록 가능
        자신이 등록한 질문 및 댓글은 수정 및 삭제 가능
    3. guest
        질문 및 댓글 읽기만 가능

## 덤프파일
    1. mysqldump 생성
		a. mysql bin폴더에서 cmd창에서 진행하기
		b. .\mysqldump.exe -uroot -p team2 > test3.sql
		c. bin안에 test(이름).sql 생성 확인
	2. mysqldump를 이용한 복구
		a. PowerShell 인경우
			i.  Get-Content 덤프.sql | .\mysql.exe -u아이디 -p team2(db명)
		b. cmd 경우
            i.  mysql -u아이디 -p team2(db명) < 덤프.sql

## 규칙

 - 관리자 기능 사용시 name을 admin으로 만들어야 함
