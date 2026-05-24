<?php
namespace App\Models;

require_once '../app/core/Database.php';

use App\Core\Database;

class Registration extends Database
{
    protected $table = 'registrations';

    // Register a volunteer to an activity
    public function register(int $userId, int $activityId)
    {
        // Check if already registered
        if ($this->isRegistered($userId, $activityId)) {
            return 'already_registered';
        }

        $query = "INSERT INTO {$this->table} (user_id, activity_id) VALUES (?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ii', $userId, $activityId);
        $stmt->execute();

        return $stmt->affected_rows > 0 ? 'success' : 'failed';
    }

    public function isRegistered(int $userId, int $activityId): bool
    {
        $query = "SELECT id FROM {$this->table} WHERE user_id = ? AND activity_id = ? LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ii', $userId, $activityId);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }

    public function getActivitiesByUser(int $userId)
    {
        $query = "SELECT a.*, r.registered_at, r.status
                FROM {$this->table} r
                JOIN activities a ON r.activity_id = a.id
                WHERE r.user_id = ? AND r.status != 'ditolak'
                ORDER BY r.registered_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $userId);
        $stmt->execute();

        $result = $stmt->get_result();
        $activities = [];
        while ($row = $result->fetch_assoc()) {
            // only count hours if verified
            $row['jam'] = $row['status'] === 'terverifikasi'
                ? $this->calculateHours($row['time'])
                : 0;
            $activities[] = $row;
        }
        return $activities;
    }
    private function calculateHours(string $time): float
    {
        $time = trim($time);
        $parts = preg_split('/\s*[\x{2013}-]\s*/u', $time);
        if (count($parts) !== 2) return 0;

        $start = strtotime(trim($parts[0]));
        $end   = strtotime(trim($parts[1]));

        if (!$start || !$end) return 0;

        $diff = ($end - $start) / 3600;
        return $diff > 0 ? round($diff, 1) : 0;
    }
    public function getVolunteersByActivity(int $activityId)
    {
        $query = "SELECT u.id, u.name, u.email, r.registered_at
                  FROM {$this->table} r
                  JOIN users u ON r.user_id = u.id
                  WHERE r.activity_id = ?
                  ORDER BY r.registered_at ASC";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('i', $activityId);
        $stmt->execute();

        $result = $stmt->get_result();
        $volunteers = [];
        while ($row = $result->fetch_assoc()) {
            $volunteers[] = $row;
        }
        return $volunteers;
    }

   public function countAccepted(int $activityId): int
    {
        $query = "SELECT COUNT(*) as total FROM {$this->table} 
                WHERE activity_id = ? AND status = 'terverifikasi'";
        $stmt  = $this->connection->prepare($query);
        $stmt->bind_param('i', $activityId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return (int) $result['total'];
    }
    public function unregister(int $userId, int $activityId)
    {
        $query = "DELETE FROM {$this->table} WHERE user_id = ? AND activity_id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('ii', $userId, $activityId);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    public function getAllRegistrations()
    {
        $query = "SELECT r.id, u.name AS nama, u.class AS kelas, a.activity AS kegiatan, r.status, a.status AS activity_status
                FROM {$this->table} r
                JOIN users u ON r.user_id = u.id
                JOIN activities a ON r.activity_id = a.id
                ORDER BY r.registered_at DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function updateStatus(int $id, string $status)
    {
        $query = "UPDATE {$this->table} SET status = ? WHERE id = ?";
        $stmt  = $this->connection->prepare($query);
        $stmt->bind_param('si', $status, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function removePendingByActivity(int $activityId)
    {
        $query = "DELETE FROM {$this->table} WHERE activity_id = ? AND status = 'menunggu'";
        $stmt  = $this->connection->prepare($query);
        $stmt->bind_param('i', $activityId);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
