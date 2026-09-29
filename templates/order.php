<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Order Calculator</title>
</head>

<body>

    <h1>Order Calculator</h1>

    <form method="POST">

        <p>
            <label for="productName">Produktname:</label><br>
            <input
                type="text"
                id="productName"
                name="productName"
                value="<?= htmlspecialchars($productName) ?>"
                required>
        </p>

        <p>
            <label for="productPrice">Preis:</label><br>
            <input
                type="number"
                id="productPrice"
                name="productPrice"
                step="0.01"
                min="0"
                value="<?= htmlspecialchars($productPrice) ?>"
                required>
        </p>

        <p>
            <label for="quantity">Menge:</label><br>
            <input
                type="number"
                id="quantity"
                name="quantity"
                min="1"
                step="1"
                value="<?= htmlspecialchars($quantity) ?>"
                required>
        </p>

        <p>
            <label for="clientType">Kundentyp:</label><br>
            <select id="clientType" name="clientType">
                <option value="regular"
                    <?= $clientType === 'regular' ? 'selected' : '' ?>>
                    Regular
                </option>

                <option value="premium"
                    <?= $clientType === 'premium' ? 'selected' : '' ?>>
                    Premium
                </option>
            </select>
        </p>

        <p>
            <button type="submit">Berechnen</button>
        </p>

    </form>

    <?php if ($resultPrice !== null): ?>
        <p>
            Total Price:
            <?= htmlspecialchars((string) $resultPrice) ?> €
        </p>
    <?php endif; ?>

    <?php if ($error !== null): ?>
        <p>
            Fehler:
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

</body>

</html>