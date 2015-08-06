<?
    class Model {

        protected static $dbc;
        protected static $table;

        public $attributes = array();

        public function __construct()
        {
            self::dbConnect();
        }

        private static function dbConnect()
        {
            if (!self::$dbc)
            {
                require_once '../../mvc_db_connect.php';
                self::$dbc = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
                self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }

        /*
         * Get a value from attributes based on name
         */
        public function __get($name)
        {
            if (array_key_exists($name, $this->attributes)) 
                {
                    return $this->attributes[$name];
                }
                return null;
        }

        /*
         * Set a new attribute for the object
         */
        public function __set($name, $value)
        {
            $this->attributes[$name] = $value;        
        }

        /*
         * Persist the object to the database
         */
        public function save()
        {
            if(!empty($this->attributes['id']))
            {
                $query = '  UPDATE users 
                            SET name = :name, email = :email
                            WHERE id = :id';
                $stmt = self::$dbc->prepare($query);
                    $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
                    $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                    $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                    $stmt->execute();
            
                echo "File has been updated at ID: " . $this->attributes['id'] . "." . PHP_EOL;
            }
            else
            {
                $query = '  INSERT INTO users (id, name, email)
                            VALUES (:id, :name, :email)';
                
                $stmt = self::$dbc->prepare($query);
                $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
                $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
                $stmt->execute();
                echo "Inserted ID: " . self::$dbc->lastInsertId();
            }
        }
        /*
         * Find a record based on an id
         */
        
        public static function find($id)
        {
            // Get connection to the database
            self::dbConnect();
            $table = static::$table;
            $query = "  SELECT * 
                        FROM $table 
                        WHERE id = $id";
            $result = self::$dbc->query($query)->fetch(PDO::FETCH_ASSOC);

            $instance = null;
            if ($result)
            {
                $instance = new static;
                $instance->attributes = $result;
            }
            return $instance;
        }

        /*
         * Find all records in a table
         */
        public static function all()
        {
            self::dbConnect();
            $table = static::$table;
            $query  = " SELECT * 
                        FROM $table";
            $results = self::$dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);
            return $results;      
        }

        public static function delete($id)
        {
            self::dbConnect();
            $stmt = self::$dbc->prepare("   DELETE FROM " . static::$table . " 
                                            WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
?>









