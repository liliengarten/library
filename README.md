<h1>Инструкции по запуску</h1>

**Перед запуском убедитесь в том, что у вас установлены:**
- **[Docker](https://docs.docker.com/engine/install/)**
- **[Docker Compose](https://docs.docker.com/compose/install/)**
- **[Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)**

Для первого запуска скопируйте в терминал следующее:
```shell
git clone https://github.com/liliengarten/library
```
Создайте и заполните файл library/deploy/dev/.env по шаблону library/deploy/dev/.env.example.
После чего скопируйте в терминал следующее:
```shell
cd library/deploy/dev
docker compose up -d --build
```
Для всех последующих запусков достаточно скопировать в терминал следующее:
```shell
cd library/deploy/dev
docker compose up
```
