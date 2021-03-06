# JA Rand
Данная библиотека предназначена для генерации случайных данных

На данный момент поддерживаются следующие типы данных:
- Даты - `date`
- IP(v4) адреса - `ip`
- User agents - `user_agent`

(Рядом указаны имена генераторов для `$generator_name`)

## Начало работы
- Создайте экземпляр класса `rand`: `$rand_lib = new rand();`
- Вызовите метод `generator($generator_name, $args)`, передав в `$generator_name` название нужного Вам генератора, и необходимые аргументы в `$args` (при необходимости)
- Вызов метода `get()` сгенерирует новые данные

**Каждый новый вызов метода `get()` будет генерировать новые данные. Обратите на это внимание, и при необходимости сохраняйте полученные данные**

Таким образом, следующий код сгенерирует случайный ip адрес

`$rand_lib->generator('ip')->get()`

Список аргументов `$args` передаётся в качестве массива

Обратите внимание, что каждый генератор имеет свой список аргументов `$args`

## Аргументы генераторов

### Даты

На данный момент это единственный генератор, который поддерживает аргументы

Поддерживаемые аргументы:
- `start_time` - стартовая метка времени Unix, которая будет использоваться в качестве минимального времени
- `end_time` - конечная метка времени Unix, которая будет использоваться в качестве максимального времени
- `format` - формат конечной даты в [DateTimeInterface::format()](https://www.php.net/manual/ru/datetime.format.php)

Таким образом, код ниже сгенерирует случайную дату между 20-м июня 1996 года и 20-м июня 2000-го года

`$rand_lib->generator('date', array('start_time' => strtotime('20-06-1996'), 'end_time' => strtotime('20-06-2000')))->get()`

По-умолчанию аргумент `format` имеет значение `Y.m.d`.

При отсутствии аргументов `start_time` и `end_time` будет сгенерирована случайная дата от 31.12.1969 до текущей метки времени 