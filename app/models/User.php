<?php
namespace App\Models;

require_once '../app/core/Database.php';
use App\Core\Database;

class User extends Database
{
    protected $table = 'users';

    public function findByEmail(string $email)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = ? LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function register(array $data)
    {
        $name     = htmlspecialchars($data['name']);
        $email    = htmlspecialchars($data['email']);
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $role     = 'volunteer';

        // check if email already exists
        $check = $this->findByEmail($email);
        if ($check) {
            return 'email_taken';
        }

        $query = "INSERT INTO {$this->table} (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt  = $this->connection->prepare($query);
        $stmt->bind_param('ssss', $name, $email, $password, $role);
        $stmt->execute();

        return $stmt->affected_rows > 0 ? 'success' : 'failed';
    }
}