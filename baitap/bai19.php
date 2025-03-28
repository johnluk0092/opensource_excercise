<!DOCTYPE html>
<html>
<head>
    <title>Bài 19: Tính cạnh huyền tam giác vuông</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #0066cc;
        }
        table {
            width: 100%;
            margin: 20px 0;
        }
        td {
            padding: 8px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CẠNH HUYỀN TAM GIÁC VUÔNG</h1>
        
        <form method="post" action="">
            <table>
                <tr>
                    <td>Cạnh A:</td>
                    <td>
                        <input type="number" name="canh_a" step="any" min="0" 
                               value="<?php echo isset($_POST['canh_a']) ? $_POST['canh_a'] : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Cạnh B:</td>
                    <td>
                        <input type="number" name="canh_b" step="any" min="0" 
                               value="<?php echo isset($_POST['canh_b']) ? $_POST['canh_b'] : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Cạnh huyền:</td>
                    <td>
                        <input type="text" name="canh_huyen" class="result" 
                               value="<?php 
                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $a = $_POST['canh_a'];
                                        $b = $_POST['canh_b'];
                                        $c = sqrt(pow($a, 2) + pow($b, 2));
                                        echo number_format($c, 2);
                                    }
                                ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="tinh" value="Tính">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>