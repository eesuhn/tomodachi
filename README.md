<p align="center">
    <img src="https://user-images.githubusercontent.com/102596628/235108615-26007766-7d20-4882-8560-39d8d3f23bfb.png" alt="logo" width="260" />
</p>

Say Hello to Tomodachi <img src="https://user-images.githubusercontent.com/102596628/235115051-10592f22-e7ef-4555-838f-daab32995b07.png" alt="logo" width="20" /> - A Gamified Habit Tracker! Taking inspiration from the classic `Tamagotchi`, we've added a virtual pet to the mix! <br>
As you form healthy habits, your pet will grow & thrive with you! But be careful - relapsing your bad habits and your pet might just get a little... not well... you will know >:)

<p align="center">
    <img src="https://user-images.githubusercontent.com/102596628/235128413-801becbf-2750-4c1e-8cf9-4a4c11c909fd.png" alt="gacha" width="200" />
</p>

As you progress in your habit-forming journey, you'll earn tokens that can be used to unlock unique pets with distinct personalities & appearances. Who knows, you might even find a Rare or Legendary pet! <img src="https://user-images.githubusercontent.com/102596628/235132299-35a2792b-1268-40bb-8075-7ebd2351f65e.png" alt="star" width="20" />

<p align="center">
    <img src="https://user-images.githubusercontent.com/102596628/235130881-a6de0d6c-0c58-4d50-a2e4-bb9e352e6c5d.png" alt="banner" width="600" />
</p>

So what are you waiting for? Sign up for Tomodachi today and start building habits the fun way! :heart:

---

## Setting up...
- `XAMPP` for Windows user, `MAMP` for Mac user

In `phpMyAdmin`: 
1. Create database named `tomodachi`, and import `db.sql`, and then `data.sql`
2. Create a file named `connection.back.php` in `/back` folder with the code below: 

```php
<?php
    class Database{
        private $host = "localhost";
        private $user = "root";
        private $pwd = "";
        private $dbName = "tomodachi";
        
        // add port if needed
        // private $port = ;

        public function connect () {
            try{
                // remove comment block when added port
                $dsn = 'mysql:host=' .$this->host .';dbname=' .$this->dbName /*.';port=' .$this->port*/;
                $pdo = new PDO($dsn, $this->user, $this->pwd);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                return $pdo;
            }catch (PDOException $e){
                print "Error: " .$e->getMessage();
                die();
            }
        }
    }
?>
```
