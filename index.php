<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}
include '../config/db.php';

$total = $conn->query("SELECT COUNT(*) as total FROM fuel")->fetch_assoc()['total'];
$sum   = $conn->query("SELECT SUM(shidaalka_litres) as sum FROM fuel")->fetch_assoc()['sum'];
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/nav.php'; ?>

<div class="container">
    <h2 class="mb-4">Welcome, <span class="text-primary"><?php echo $_SESSION['user']; ?></span>!</h2>

    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Records</h5>
                    <p class="display-6"><?php echo $total; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Litres</h5>
                    <p class="display-6"><?php echo number_format($sum, 2); ?> L</p>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Quick Actions</h5>
                    <a href="../fuel/add.php" class="btn btn-primary w-100 mb-2">➕ Register Fuel</a>
                    <a href="../fuel/view.php" class="btn btn-secondary w-100 mb-2">📋 View Records</a>
                    <a href="../reports/index.php" class="btn btn-info w-100 text-white mb-2">📊 Reports</a>
                    <a href="../auth/logout.php" class="btn btn-danger w-100">🚪 Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
