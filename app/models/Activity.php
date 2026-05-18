<?php
namespace App\Models;
require_once '../app/core/Database.php';

use App\Core\Database;

class Activity extends Database
{
    protected $table = 'kegiatan';

    public function getActivities()
    {
        $activities = [];
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        while ($activity = $result->fetch_assoc()) {
            $activities[] = $activity;
        }

        return $activities;
    }

    public function getActivity(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insert(array $data)
    {
        $activity      = $this->clean($data['activity'] ?? '');
        $thumbnail     = $this->clean($data['thumbnail'] ?? '');
        $date          = $this->clean($data['date'] ?? '');
        $time          = $this->clean($data['time'] ?? '');
        $location      = $this->clean($data['location'] ?? '');
        $description   = $this->clean($data['description'] ?? '');
        $goal          = $this->clean($data['goal'] ?? '');
        $event         = $this->clean($data['event'] ?? '');
        $quota         = (int) ($data['quota'] ?? 0);
        $doc1          = $this->clean($data['documentation-1'] ?? '');
        $doc2          = $this->clean($data['documentation-2'] ?? '');
        $doc3          = $this->clean($data['documentation-3'] ?? '');
        $doc4          = $this->clean($data['documentation-4'] ?? '');

        $query = "INSERT INTO {$this->table} 
                    (activity, thumbnail, date, time, location, description, goal, event, quota, `documentation-1`, `documentation-2`, `documentation-3`, `documentation-4`) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssssssssissss', $activity, $thumbnail, $date, $time, $location, $description, $goal, $event, $quota, $doc1, $doc2, $doc3, $doc4);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /admin/activities');
            exit();
        } else {
            echo "Gagal menambahkan kegiatan.";
        }
    }

    public function update(array $data, int $id)
    {
        $activity      = $this->clean($data['activity'] ?? '');
        $thumbnail     = $this->clean($data['thumbnail'] ?? '');
        $date          = $this->clean($data['date'] ?? '');
        $time          = $this->clean($data['time'] ?? '');
        $location      = $this->clean($data['location'] ?? '');
        $description   = $this->clean($data['description'] ?? '');
        $goal          = $this->clean($data['goal'] ?? '');
        $event         = $this->clean($data['event'] ?? '');
        $quota         = (int) ($data['quota'] ?? 0);
        $doc1          = $this->clean($data['documentation-1'] ?? '');
        $doc2          = $this->clean($data['documentation-2'] ?? '');
        $doc3          = $this->clean($data['documentation-3'] ?? '');
        $doc4          = $this->clean($data['documentation-4'] ?? '');

        $query = "UPDATE {$this->table} 
                  SET activity=?, thumbnail=?, date=?, time=?, location=?, description=?, goal=?, event=?, quota=?, `documentation-1`=?, `documentation-2`=?, `documentation-3`=?, `documentation-4`=? 
                  WHERE id=?";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ssssssssissssi', $activity, $thumbnail, $date, $time, $location, $description, $goal, $event, $quota, $doc1, $doc2, $doc3, $doc4, $id);
        $stmt->execute();

        header('Location: /admin/activities');
        exit();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: /admin/activities');
            exit();
        } else {
            echo "Gagal menghapus kegiatan.";
        }
    }

    private function clean(string $value): string
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }
}
?>
