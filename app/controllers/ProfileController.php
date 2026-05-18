<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/User.php';
require_once '../app/models/Registration.php';

use App\Core\Controller;
use App\Models\User;
use App\Models\Registration;

class ProfileController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userId = (int) $_SESSION['user_id'];

        $userModel = new User();
        $regModel  = new Registration();

        $user    = $userModel->getProfile($userId);
        $riwayat = $regModel->getActivitiesByUser($userId);

        // calculate total hours
        $totalJam = array_sum(array_column($riwayat, 'jam'));

        $siswa = [
            'nama'    => $user['name'],
            'kelas'   => $user['class'] ?? '-',
            'sekolah' => 'SMK Kristen Immanuel',
            'foto'    => $user['profile_picture'] ?? null,
            'status'  => $user['role'] === 'admin' ? 'Admin' : 'Siswa Aktif',
        ];

        $this->view('profile.index', [
            'siswa'    => $siswa,
            'riwayat'  => $riwayat,
            'totalJam' => $totalJam,
        ]);
    }

    public function upload()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit();
    }

    $userId = (int) $_SESSION['user_id'];

    if (empty($_FILES['profile_picture']['name'])) {
        header('Location: /profile');
        exit();
    }

    $file    = $_FILES['profile_picture'];
    $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($ext, $allowed)) {
        header('Location: /profile?error=invalid_file');
        exit();
    }

    $folder     = '../public/assets/profiles/';
    $filename   = 'profile-user' . $userId . '.webp';
    $savePath   = $folder . $filename;
    $publicPath = '/assets/profiles/' . $filename;

    // delete old file (updating profile picture will replace the old one)
    foreach (glob($folder . 'profile-user' . $userId . '.*') as $oldFile) {
        unlink($oldFile);
    }

    // load image based on type (if somehow the user finds a way to upload a non-image file with an allowed extension)
    $mime = mime_content_type($file['tmp_name']);
    $src  = match($mime) {
        'image/jpeg' => imagecreatefromjpeg($file['tmp_name']),
        'image/png'  => imagecreatefrompng($file['tmp_name']),
        'image/webp' => imagecreatefromwebp($file['tmp_name']),
        default      => null
    };

    if (!$src) {
        header('Location: /profile?error=invalid_file');
        exit();
    }

    // Optimize and save as webp
    $origW = imagesx($src);
    $origH = imagesy($src);
    $maxSize = 400;

    if ($origW > $maxSize || $origH > $maxSize) {
        $ratio = min($maxSize / $origW, $maxSize / $origH);
        $newW  = (int) round($origW * $ratio);
        $newH  = (int) round($origH * $ratio);
    } else {
        $newW = $origW;
        $newH = $origH;
    }

    $dst = imagecreatetruecolor($newW, $newH);

    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

    imagewebp($dst, $savePath, 80);

    imagedestroy($src);
    imagedestroy($dst);

    // DB
    $userModel = new User();
    $userModel->updateProfilePicture($userId, $publicPath);
    $_SESSION['user_picture'] = $publicPath;

    header('Location: /profile');
    exit();
}
}