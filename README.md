# WIAM
### Инструкция запуска
1. клонируем проект:
ssh
```
git clone git@github.com:Biggy905/wiam.git
```
https
```
git clone https://github.com/Biggy905/wiam.git
```
2. создаем сеть для докера
```
make network-create
```
3. поднимаем контейнеры
```
make up
```
4. запускаем композер
```
make composer-install
```
5. поднимаем миграцию в БД
```
make migrate-up
```
6. модифицируем уровень доступа к директории
```
make modify-dir
```
7. доступные команды
```
make help
```


### О проекте
Проект доступен по адресу:

http:://localhost:4500
