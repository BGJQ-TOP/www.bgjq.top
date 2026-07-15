<?php
class Database {
    
    private static $connection = null;
    private static $bgjqConnection = null;
    private $pdo = null;
    
    private function __construct($config) {
        $this->initConnection($config);
    }
    
    public static function connect($config) {
        if (self::$connection === null) {
            self::$connection = new self($config);
        }
        return self::$connection;
    }
    
    public static function connectBgjq($config) {
        if (self::$bgjqConnection === null) {
            self::$bgjqConnection = new self($config);
        }
        return self::$bgjqConnection;
    }
    
    public static function getInstance() {
        return self::$connection;
    }
    
    public static function getBgjqInstance() {
        return self::$bgjqConnection;
    }
    
    private function initConnection($config) {
        if (!is_array($config)) {
            throw new Exception("Database config must be an array, got: " . gettype($config));
        }
        
        $host = $config['host'] ?? 'localhost';
        $port = $config['port'] ?? 3306;
        $database = $config['database'] ?? '';
        $charset = $config['charset'] ?? 'utf8mb4';
        $username = $config['username'] ?? 'root';
        $password = $config['password'] ?? '';
        
        try {
            $dsn = sprintf(
                "mysql:host=%s;port=%s;dbname=%s;charset=%s",
                $host,
                $port,
                $database,
                $charset
            );
            
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public function query($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    
    public function select($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    
    public function selectOne($sql, $params = []) {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }
    
    public function insert($table, $data) {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = implode(', ', array_map(function($k) { return ':' . $k; }, $keys));
        
        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})";
        
        $this->query($sql, $data);
        
        return $this->pdo->lastInsertId();
    }
    
    public function update($table, $data, $where, $whereParams = []) {
        $setParts = [];
        foreach (array_keys($data) as $key) {
            $setParts[] = "{$key} = :{$key}";
        }
        $set = implode(', ', $setParts);
        
        $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
        
        $this->query($sql, array_merge($data, $whereParams));
        
        return true;
    }
    
    public function delete($table, $where, $params = []) {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $this->query($sql, $params);
        
        return true;
    }
    
    public function beginTransaction() {
        return $this->pdo->beginTransaction();
    }
    
    public function commit() {
        return $this->pdo->commit();
    }
    
    public function rollback() {
        return $this->pdo->rollBack();
    }
    
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
