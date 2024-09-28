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
6. накатываем данные в БД
```
make fixture-load
```
7. модифицируем уровень доступа к директории
```
make modify-dir
```
8. доступные команды
```
make help
```
Доступна коллекция для Postman. Файл: WIAM.postman_collection.json

### О проекте
Проект доступен по адресу:

http:://localhost:4500

### Время выполнения заняло: 8ч. 
1. Сборка докера - 30 минут;
2. Конфигурация API - 30 минут;
3. Конфигурация Console - 30 минут;
4. Миграция, сущности, запросы, сущности - 1 час;
5. Конфигурация фикстур, и наполнение - 40 минут;
6. Контроллеры, сервисные слои, запросы - 2 часа;
7. Создание нового сервиса "php daemon": 20 минут;
8. Создание для Job: миграция, сущности, запросы - 1 час;
9. Создание логики для Job: 1 час;
10. Тестирование: 50 минут;

В задаче изменен подход к решению задачки:

## Запуск обработки заявок на займ. По результату обработки каждой заявки, ей должен быть установлен один из статусов “approved” или ”declined”. Принятие решения должно происходить рандомно. Вероятность аппрува заявки – 10%. У одного пользователя не может быть более одной одобренной заявки. Нужно эмулировать продолжительное время принятия решения каждой заявки с помощью функции sleep(), в которую в качестве аргумента передать значение delay из запроса. Этот эндпоинт может быть запрошен несколько раз одновременно. Заявки одного пользователя могут обрабатываться параллельно.

С виду несовершенства бизнес-логики по существу задачки, я поступил иначе, в результате мы имеем более совершенная бизнес-логика, перечислю главное качество: 
1) Гибкость; 
2) Независимость от других бизнес-логики;
3) Контроль с данными;
4) Посмотреть информацию:
- какие задачки на подходе
- какие задачки выполнены, и их список заявок.
- какие задачки повторяются, для них соблюдается одно условие - выполнить хоть одну заявку для принятии решении.

-
Порядок выполнения бизнес-логики:
1) Создаем заявки, пусть будет несколько заявок.
2) Запрашиваем на обновление данных - принятия решения заявок. Под капотом, создается в таблице orders_delay новая запись.
3) В PHP-daemon следит новых данных из таблицы orders_delay. Если поступил запрос на обновление данных(принятия решения заявок), то запускаем обработку. 

И так происходит циклично.