## 構築

```
$ docker-compose build
$ docker-compose up -d
```

## 接続（web）

```
$ docker-compose exec web bash
```

## 接続（db）

```
$ docker-compose exec db ash

# psql -U admin -d ut-skillup
```

password: `password`

## ex. test table作成＆接続確認まで

```
# create table mybook (id integer, name varchar(10));

# insert into mybook values (1, 'hoge');
# insert into mybook values (2, 'fuga');
```

```index.php
<?php

echo "hello, world";

$dsn = 'pgsql:dbname=ut-skillup;host=db';
$db = new PDO($dsn, 'admin', 'password');

$sql = 'SELECT * FROM mybook';
echo '<pre>';
foreach ($db->query($sql) as $row) {
  var_dump($row);
}
echo '</pre>';
```