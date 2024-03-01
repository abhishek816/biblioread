<?php 
include('connect.php');
if (isset($_GET['books'])) {
    $title = $conn->real_escape_string($_GET['books']);
    $sql = "SELECT * FROM books WHERE title = '$title'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo 'Not Found!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        header {
    display: flex;
    align-items: center;
    background-color: #333;
    color: #fff;
    padding: 1rem;
    }

header img {
    max-width: 100px;
    margin-right: 1rem;
}

header h1 {
    margin: 0;
}
        
        main {
            flex: 1;
            display: flex;
            justify-content: space-between;
            padding: 2rem;
            align-items: flex-start;
        }
        
        .product-image img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .product-description {
            flex: 1;
            padding: 0 2rem;
        }
        .booktype {
            flex: 1;
            padding: 0 2rem;
        }
        
        .product-actions {
            flex: 1;
            text-align: center;
            padding: 0 2rem;
        }
        
        .product-actions h2 {
            color: #333;
        }
        
        button {
            background-color: #333;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #555;
        }
    .bottom-section {
        text-align: center;
        margin-right: 300px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        margin-top: auto; /* Pushes the section to the bottom */
        padding: 2rem;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
     

    .rating {
        display: flex;
        flex-direction: row;
        align-items: center; /* Align the stars vertically with the review tag */
        flex: 1;
        text-align: center;
        padding: 0 2rem;
    }

    .rating > input {
        display: none;
    }

    .rating > label {
        display: inline-block;
        margin: 0.2rem;
        padding: 0;
        width: 20px;
        height: 20px;
        font-size: 2em;
        font-family: 'Arial', sans-serif;
        color: lightgray;
        cursor: pointer;
    }

    .rating > label:before {
        content: '★';
    }

    .rating > input:checked ~ label {
        color: gold;
    }
        
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
</head>
<body>
<header>
        <a href="index.php"><img src="images/main-logo1.png" alt="Company Logo"></a>
        
    </header>
    <h1> <?php echo $row['title'];?>
    </h1>
    <main>
        <div class="product-image">
            <?php echo '<img src="' . $row["image_path"] . '" alt="Product Image">" ' ?>
        </div>
        <div class="product-description">
            <h2>Description</h2>
            <p><?php echo $row['desc_ription'];?></p>
        </div>
        <div class="booktype">
    <h2>Book Type</h2>
    <p><?php echo $row['book_type']; ?></p>
    <input type="hidden" name="book_type_user" id="book_type_user" value="<?php echo $row['book_type']; ?>">
    <label for="book_type_user">Select Book Type</label>
    <select name="selected_book_type" id="book_type">
        <option selected>Open this select menu</option>
        <option value="E-book">E-book</option>
        <option value="Hardcopy">Hardcopy</option>
    </select>
</div>
        
<form action="add_review.php" method="post">
        
        <label for="review">Review:</label>
        <textarea name="review" id="review" rows="4"></textarea>
        <input type="submit" value="Submit Review">
        <div class="rating">
            <input type="radio" name="rating" id="star5" value="5"><label for="star5"></label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4"></label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
            <input type="radio" name="rating" id="star2" value="2"><label for "star2"></label>
            <input type="radio" name="rating" id="star1" value="1"><label for="star1"></label>
        </div>
    </form>
    

        <div class="product-actions">
            <h2>₹<?php echo $row['price'];?></h2>
            <button id="buy-now">Buy Now</button>
            
            <button id="add-to-cart">Add to Cart</button>   
        </div>
       
    </main>
    <p><b>*Please add book name at the end of the review<p>
    
    <footer>
        <p>&copy; 2023 BIBLIOREAD. All rights reserved.</p>
    </footer>
    <script>
       document.addEventListener('DOMContentLoaded', () => {
            const reviewForm = document.getElementById('reviewForm');
            const reviewsList = document.getElementById('reviews');

            reviewForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const username = document.getElementById('username').value;
                const reviewText = document.getElementById('review').value;

                if (username.trim() === '' || reviewText.trim() === '') {
                    alert('Please enter both your username and review.');
                    return;
                }

                const reviewItem = document.createElement('li');
                reviewItem.innerHTML = `<strong>${username}:</strong> ${reviewText}`;
                reviewsList.appendChild(reviewItem);

                reviewForm.reset();
            });
        });
        document.getElementById('buy-now').addEventListener('click', function () {
    // Get the selected book type
    const selectedBookType = document.getElementById('book_type').value;
    
    // Set the hidden input field value to the selected book type
    document.getElementById('book_type_user').value = selectedBookType;

    // Use JavaScript to redirect to the PHP script with the selected book type as a parameter
    window.location.href = `order.php?book_id=<?php echo $row['id']; ?>&book_type_user=${selectedBookType}`;
});

        // Get the selected book type
       
     document.getElementById('add-to-cart').addEventListener('click', function () {
     const selectedBookType = document.getElementById('book_type').value;
  

     document.getElementById('book_type_user').value = selectedBookType;
     
     window.location.href = `cart.php?book_id=<?php echo $row['id']; ?>&book_type_user=${selectedBookType}`;
    });



    </script>
</body>
</body>
</html>
