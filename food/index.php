<?php include 'layouts/header.html'; ?>

<?php
// This is the PHP section (if needed for dynamic content or processing)
$menu_items = [
    "Burger" => "$5.99",
    "Fries" => "$2.49",
    "Pizza" => "$8.99",
    "Soda" => "$1.49",
    "Hot Dog" => "$3.49",
    "Salad" => "$4.99",
    "Chicken Wings" => "$6.99",
    "Milkshake" => "$3.99",
    "Ice Cream" => "$2.99"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food Restaurant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #ff6347;
        }
        .slider {
            width: 100%;
            height: 300px;
            overflow: hidden;
            position: relative;
            background-color: #333;
        }
        .slider img {
            width: 30%;
            height: 100%;
            object-fit: cover;
            animation: slide 30s infinite;
        }
        @keyframes slide {
            0% {transform: translateX(0);}
            25% {transform: translateX(-100%);}
            50% {transform: translateX(-200%);}
            75% {transform: translateX(-300%);}
            100% {transform: translateX(0);}
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 20px;
        }
        .grid-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .grid-item:hover {
            transform: scale(1.05);
        }
        .menu-item {
            font-size: 1.2em;
            color: #333;
        }
        .price {
            font-size: 1.1em;
            color: #ff6347;
        }
    </style>
</head>
<body>

    <h1>Welcome to Fast Food Restaurant!</h1>

    <!-- Image slider -->
    <div class="slider">
        <img src="data:image/jpeg;base64,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" alt="Burger Lovers">
        <img src="data:image/jpeg;base64,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" alt="Fresh Fries">
        <img src="https://via.placeholder.com/1500x500/ff1493/ffffff?text=Pizza+Time" alt="Pizza Time">
        <img src="https://via.placeholder.com/1500x500/1e90ff/ffffff?text=Delicious+Drinks" alt="Delicious Drinks">
    </div>

    <!-- Menu Grid -->
    <div class="grid">
        <?php foreach ($menu_items as $item => $price): ?>
            <div class="grid-item">
                <img src="data:image/jpeg;base64,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<?php echo $item; ?>" alt="<?php echo $item; ?>">
                <p class="menu-item"><?php echo $item; ?></p>
                <p class="price"><?php echo $price; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        // JavaScript to handle any interactivity (e.g., click events, animations)
        document.querySelectorAll('.grid-item').forEach(item => {
            item.addEventListener('click', () => {
                alert("You clicked on " + item.querySelector('.menu-item').textContent);
            });
        });
    </script>

</body>
</html>


<?php include 'layouts/footer.html'; ?>