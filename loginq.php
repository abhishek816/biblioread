<?php 
    include('connect.php');
    $uname = $password = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uname = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM signup WHERE name = ? AND password = ?";
        
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Error: " . $conn->error;
            exit();
        }

        $stmt->bind_param("ss", $uname, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo 'This user does not exists';
        } else {
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $id = $row['u_id'];
                setcookie("u_id", $id, time() + 3600, "/");
                header('Location: user.php');
                exit();
            } else {
                echo "Invalid email or password.";
            }
        }

        $stmt->close();
        $result->close();
    } 
?>