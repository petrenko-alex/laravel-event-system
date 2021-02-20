## Модуль: Laravel event system (LES) серии Laravel Beauties For Bitrix (LB4B)

В Битрикс события обработчики событий регистрируются 2 методами: 
- RegisterModuleDependences
- AddEventHandler.

В примерах документации функции обработичики размещаются там же, где и их регистрация.
Никакого разбиения по модулям, событиям не диктуется. 
Иногда в более сложных сценариях в документации есть упоминание о неком абстрактном
классе с обработчиками (https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=1978&LESSON_PATH=3913.3516.3493.4979.1978)

Проблема:  
Регистрация обработчиков обычо происходит в процедурном init.php 
и размещать там же обработчики - не вариант.
Сам Битрикс по сути диктует, как и где лучше размещать обработчики.
ИВ в модуле intervolga.common пошли дальше и добавили авторегистрацию обработчиоков.
Она предполагает разбиение обработчиков по модулям.
Обработчики хранятся в файлах, название которых совпадает с названием модуля. 
Метод обработчика должен совпадать с названием события.
Следующая проблема возникает, когда логика обработчика нетривиальная и много кода
или
несколько разных обработчиов.
Кода в одном методе становится слишком много => разиваем на отдельные методы => разрастается класс.

Решение:  
Система событий Laravel решает эту проблему. 
В Laravel для каждого обработчика принято создавать свой класс Listener'а, 
в котором и инкапсулируется логика обработчика.

Текущий модуль призван решить описанную проблему, путем частичного переноса логики
событийной модели laravel.


Laravel events: https://laravel.com/docs/8.x/events#event-subscribers

Что будем переносить:
1. Регистрация обработчиков с помощью EventServiceProvider (ручная + авто)  
\#Registering Events & Listeners

2. События как классы - под вопросом (у битрикс это и так есть, может как-то совместить)  
\#Defining Events

3. Обработчики как классы - да  
\#Defining Listeners

4. Очереди обработчиков - нет  
\#Queued Event Listeners

5. Вызов событий - нет, это делает bitrix (может чисто оберку dispatch для элегантности)  
\#Dispatching Events

6. Event Subscribers - возможно  
\#Event Subscribers


MVP:
1,3

Детали:  
В старых событиях - аргументы разные, разное количество, не стандартизированы.
Далее появляется объект \Bitrix\Main\Event
Ну и вишенка - события в ORM

В своем модуле предусмотреть взаимосвязь событий - прокидывание данных из 1 события в другое
