<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Registration.php';

use App\Core\Controller;
use App\Models\Registration;

class VerificationController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /activities');
            exit();
        }

        $regModel      = new Registration();
        $registrations = $regModel->getAllRegistrations();

        $kegiatanList = array_unique(array_column($registrations, 'kegiatan'));

        $activeFilter = $_GET['kegiatan'] ?? 'Semua';
        $filtered = $activeFilter === 'Semua'
            ? $registrations
            : array_filter($registrations, fn($r) => $r['kegiatan'] === $activeFilter);

        $this->view('admin.verification', [
            'registrations' => $registrations,
            'filtered'      => $filtered,
            'kegiatanList'  => $kegiatanList,
            'activeFilter'  => $activeFilter,
        ]);
    }

    public function approve(string $id)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /activities');
            exit();
        }

        $regModel = new Registration();
        $regModel->updateStatus((int) $id, 'terverifikasi');

        header('Location: /admin/verification');
        exit();
    }

    public function reject(string $id)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /activities');
            exit();
        }

        $regModel = new Registration();
        $regModel->updateStatus((int) $id, 'ditolak');

        header('Location: /admin/verification');
        exit();
    }
}