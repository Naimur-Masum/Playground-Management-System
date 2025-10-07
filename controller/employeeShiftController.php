    <?php
    require_once("../model/EmployeeShiftModel.php");
    session_start();

    if (!isset($_SESSION['loginEmail']) || $_SESSION['role'] != 'employee') {
        header("Location: ../login.php");
        exit;
    }

    $employee_id = $_SESSION['user_id'] ?? null;

    if (!$employee_id) {
        die("Employee not found.");
    }

    if (isset($_POST['clock_in'])) {
        $clockedIn = clockIn($employee_id);
        if ($clockedIn) {
            $message = "Clocked in successfully.";
        }
        else {
            $message = "Failed to clock in.";
        }
        header("Location: ../view/employee/shift.php?message=" . urlencode($message));
        exit;
    }

    if (isset($_POST['clock_out'])) {
        $latestShift = getLatestShift($employee_id);

        if ($latestShift && $latestShift['check_out'] === null) {
            $clockedOut = clockOut($latestShift['shift_id']);
            if ($clockedOut) {
                $message = "Clocked out successfully.";
            }
            else {
                $message = "Failed to clock out.";
            }
        }
        else {
            $message = "No active shift found to clock out.";
        }

        header("Location: ../view/employee/shift.php?message=" . urlencode($message));
        exit;
    }

    $shifts = getShiftsByEmployee($employee_id);
    ?>
