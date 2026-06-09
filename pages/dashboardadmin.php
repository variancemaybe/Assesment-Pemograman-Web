<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php?p=admin");
    exit;
}

require_once __DIR__ . '/../class/class.Connection.php';
require_once __DIR__ . '/../class/class.User.php';

$userObj = new User();
$msg = '';
$error = '';
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'reservasi';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Handle Add User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "Semua field harus diisi.";
    } elseif ($userObj->emailExists($email)) {
        $error = "Email sudah terdaftar!";
    } else {
        $userObj->addUser($name, $email, $password, $role);
        $msg = "User berhasil ditambahkan.";
    }
    $activeTab = 'userlist';
}

// Handle Edit User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "Semua field harus diisi.";
    } elseif ($userObj->emailExists($email)) {
        $error = "Email sudah terdaftar!";
    } else {
        $userObj->name     = $name;
        $userObj->email    = $email;
        $userObj->password = $password;
        $userObj->role     = $role;
        $userObj->AddUser();
        $msg = $userObj->message;
    }
    $activeTab = 'userlist';
}

// Handle Delete User
if ($action == 'delete' && isset($_GET['userid'])) {
    $userObj->deleteUser((int)$_GET['userid']);
    header("Location: index.php?p=admin&tab=userlist&msg=deleted");
    exit;
}

$users = $userObj->getAllUsers();
$editUser = null;
if ($action == 'edit' && isset($_GET['userid'])) {
    $editUser = $userObj->getUserById((int)$_GET['userid']);
    $activeTab = 'userlist';
}
?>

<div class="page-content-wrapper" style="background-color: var(--cream-bg); color: var(--text-dark); padding: 0 2rem 5rem;">
    <div style="max-width: 1100px; margin: 0 auto;">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; padding-top:2rem;">
            <div>
                <h2 style="font-size:2.2rem; margin:0; color:var(--text-dark);">Admin Dashboard</h2>
                <p style="margin:0.3rem 0 0 0; font-weight:300; font-size:0.9rem;">
                    Welcome, <strong>Alicia J Zelaya</strong> &mdash; anda login sebagai <strong>admin</strong>
                </p>
            </div>
            <a href="index.php?p=admin&action=logout"
               style="color:#d9534f; text-decoration:none; border:1px solid #d9534f; padding:0.5rem 1.2rem; border-radius:4px; font-size:0.9rem; transition:0.3s;"
               onmouseover="this.style.backgroundColor='#d9534f';this.style.color='#fff';"
               onmouseout="this.style.backgroundColor='transparent';this.style.color='#d9534f';">
               Logout
            </a>
        </div>

        <div style="display:flex; border-bottom:1px solid #d0c8b8; margin-bottom:2rem; background:#fff; border-radius:6px 6px 0 0; overflow:hidden;">
            <a href="index.php?p=admin&tab=reservasi"
               style="padding:0.7rem 1.8rem; text-decoration:none; font-size:0.9rem; font-weight:500;
                      border-bottom:<?= $activeTab=='reservasi' ? '3px solid #c4a661' : '3px solid transparent' ?>;
                      color:<?= $activeTab=='reservasi' ? '#c4a661' : '#666' ?>;">
               &#128203; Daftar Reservasi
            </a>
            <a href="index.php?p=admin&tab=userlist"
               style="padding:0.7rem 1.8rem; text-decoration:none; font-size:0.9rem; font-weight:500;
                      border-bottom:<?= $activeTab=='userlist' ? '3px solid #c4a661' : '3px solid transparent' ?>;
                      color:<?= $activeTab=='userlist' ? '#c4a661' : '#666' ?>;">
               &#128101; User List
            </a>
        </div>

        <?php if (!empty($msg)): ?>
            <div style="padding:0.8rem 1rem; background:rgba(90,158,111,0.15); border:1px solid #5a9e6f; border-radius:4px; color:#3a7a52; margin-bottom:1rem; font-size:0.9rem;">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div style="padding:0.8rem 1rem; background:rgba(217,83,79,0.1); border:1px solid #d9534f; border-radius:4px; color:#d9534f; margin-bottom:1rem; font-size:0.9rem;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($activeTab == 'reservasi'): ?>
        <div style="background:#fff; border-radius:0 0 6px 6px; padding:2rem; box-shadow:0 2px 12px rgba(0,0,0,0.07);">
            <h3 style="font-size:1.6rem; margin:0 0 1.5rem 0; color:var(--text-dark); font-weight:400;">Daftar Reservasi Masuk</h3>
            <?php if (!empty($_SESSION['reservasi_list'])): ?>
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead><tr>
                        <?php foreach(["No.","Nama","Email","Tanggal","Meja","Area"] as $h): ?>
                        <th style="padding:0.75rem 1rem; text-align:left; font-size:0.85rem; font-weight:600; color:#555; border-bottom:2px solid #e0d8cc; background:#f5f0e8;"><?= $h ?></th>
                        <?php endforeach; ?>
                    </tr></thead>
                    <tbody>
                        <?php foreach($_SESSION['reservasi_list'] as $i => $res): ?>
                        <tr onmouseover="this.style.background='#faf7f2'" onmouseout="this.style.background='transparent'">
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= $i+1 ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><strong><?= htmlspecialchars((string)$res->nama) ?></strong></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= htmlspecialchars((string)$res->email) ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= date('d F Y', strtotime((string)$res->tanggal)) ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= htmlspecialchars((string)$res->meja) ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= htmlspecialchars((string)$res->area) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <p style="font-style:italic; color:#888;">-- Belum ada data reservasi --</p>
            <?php endif; ?>
        </div>

        <?php elseif ($activeTab == 'userlist'): ?>
        <div style="background:#fff; border-radius:0 0 6px 6px; padding:2rem; box-shadow:0 2px 12px rgba(0,0,0,0.07);">

            <?php if ($editUser): ?>
            <a href="index.php?p=admin&tab=userlist" style="color:#c4a661; text-decoration:none; font-size:0.9rem;">← Kembali ke User List</a>
            <h3 style="font-size:1.6rem; margin:1rem 0 1.5rem 0; font-weight:400;">Edit User</h3>
            <form method="POST" action="index.php?p=admin&tab=userlist" style="max-width:560px;">
                <input type="hidden" name="userid" value="<?= $editUser['userid'] ?>">
                <?php foreach([
                    ['Name','name','text',$editUser['name']],
                    ['Email','email','email',$editUser['email']],
                    ['Password','password','text',$editUser['password']],
                ] as [$label,$name,$type,$val]): ?>
                <div style="display:grid; grid-template-columns:130px 10px 1fr; align-items:center; margin-bottom:1.2rem; gap:0.5rem;">
                    <label style="font-size:0.95rem; color:#444;"><?= $label ?></label>
                    <span>:</span>
                    <input type="<?= $type ?>" name="<?= $name ?>" value="<?= htmlspecialchars($val) ?>" required
                           style="padding:0.75rem; border:1px solid #ccc; border-radius:4px; font-size:0.95rem; width:100%; box-sizing:border-box;">
                </div>
                <?php endforeach; ?>
                <div style="display:grid; grid-template-columns:130px 10px 1fr; align-items:center; margin-bottom:2rem; gap:0.5rem;">
                    <label style="font-size:0.95rem; color:#444;">Role</label>
                    <span>:</span>
                    <select name="role" style="padding:0.75rem; border:1px solid #ccc; border-radius:4px; font-size:0.95rem; width:100%; box-sizing:border-box;">
                        <?php foreach(['employee','manager','admin'] as $r): ?>
                        <option value="<?= $r ?>" <?= $editUser['role']==$r?'selected':'' ?>><?= $r ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="display:flex; gap:0.8rem;">
                    <button type="submit" name="edit_user" style="background:#c4a661; color:#fff; border:none; padding:0.6rem 1.4rem; cursor:pointer; border-radius:3px;">Save</button>
                    <a href="index.php?p=admin&tab=userlist" style="background:#888; color:#fff; padding:0.6rem 1.4rem; border-radius:3px; text-decoration:none;">Cancel</a>
                </div>
            </form>

            <?php elseif ($action == 'add'): ?>
            <a href="index.php?p=admin&tab=userlist" style="color:#c4a661; text-decoration:none; font-size:0.9rem;">← Kembali ke User List</a>
            <h3 style="font-size:1.6rem; margin:1rem 0 1.5rem 0; font-weight:400;">Add User</h3>
            <form method="POST" action="index.php?p=admin&tab=userlist" style="max-width:560px;">
                <?php foreach([['Name','name','text'],['Email','email','email'],['Password','password','text']] as [$label,$name,$type]): ?>
                <div style="display:grid; grid-template-columns:130px 10px 1fr; align-items:center; margin-bottom:1.2rem; gap:0.5rem;">
                    <label style="font-size:0.95rem; color:#444;"><?= $label ?></label>
                    <span>:</span>
                    <input type="<?= $type ?>" name="<?= $name ?>" placeholder="<?= $label ?>" required
                           style="padding:0.75rem; border:1px solid #ccc; border-radius:4px; font-size:0.95rem; width:100%; box-sizing:border-box;">
                </div>
                <?php endforeach; ?>
                <div style="display:grid; grid-template-columns:130px 10px 1fr; align-items:center; margin-bottom:2rem; gap:0.5rem;">
                    <label style="font-size:0.95rem; color:#444;">Role</label>
                    <span>:</span>
                    <select name="role" style="padding:0.75rem; border:1px solid #ccc; border-radius:4px; font-size:0.95rem; width:100%; box-sizing:border-box;">
                        <option value="employee">employee</option>
                        <option value="manager">manager</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div style="display:flex; gap:0.8rem;">
                    <button type="submit" name="add_user" style="background:#c4a661; color:#fff; border:none; padding:0.6rem 1.4rem; cursor:pointer; border-radius:3px;">Save</button>
                    <a href="index.php?p=admin&tab=userlist" style="background:#888; color:#fff; padding:0.6rem 1.4rem; border-radius:3px; text-decoration:none;">Cancel</a>
                </div>
            </form>

            <?php else: ?>
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                <h3 style="font-size:1.6rem; margin:0; font-weight:400;">User List</h3>
                <a href="index.php?p=admin&tab=userlist&action=add"
                   style="background:#c4a661; color:#fff; padding:0.6rem 1.4rem; text-decoration:none; border-radius:3px; font-size:0.9rem; font-weight:500;">
                   + Add User
                </a>
            </div>
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead><tr>
                        <?php foreach(["No.","UserID","Name","Email","Role","Action"] as $h): ?>
                        <th style="padding:0.75rem 1rem; text-align:left; font-size:0.85rem; font-weight:600; color:#555; border-bottom:2px solid #e0d8cc; background:#f5f0e8;"><?= $h ?></th>
                        <?php endforeach; ?>
                    </tr></thead>
                    <tbody>
                        <?php foreach($users as $i => $u):
                            $rc = ['admin'=>'#c4a661','manager'=>'#5b8db8','employee'=>'#5a9e6f'];
                            $color = $rc[$u['role']] ?? '#888';
                        ?>
                        <tr onmouseover="this.style.background='#faf7f2'" onmouseout="this.style.background='transparent'">
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= $i+1 ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= $u['userid'] ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><strong><?= htmlspecialchars($u['name']) ?></strong></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;"><?= htmlspecialchars($u['email']) ?></td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;">
                                <span style="background:<?= $color ?>; color:#fff; padding:0.2rem 0.7rem; border-radius:20px; font-size:0.78rem; font-weight:500;"><?= $u['role'] ?></span>
                            </td>
                            <td style="padding:0.75rem 1rem; border-bottom:1px solid #eee;">
                                <a href="index.php?p=admin&tab=userlist&action=edit&userid=<?= $u['userid'] ?>"
                                   style="background:#e0a84b; color:#fff; padding:0.4rem 0.9rem; text-decoration:none; border-radius:3px; font-size:0.85rem; margin-right:0.4rem;">Edit</a>
                                <a href="index.php?p=admin&tab=userlist&action=delete&userid=<?= $u['userid'] ?>"
                                   style="background:#d9534f; color:#fff; padding:0.4rem 0.9rem; text-decoration:none; border-radius:3px; font-size:0.85rem;"
                                   onclick="return confirm('Yakin hapus user ini?')">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p style="margin-top:1.2rem; font-size:0.85rem; color:#888;">Total: <?= count($users) ?> user terdaftar</p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</div>