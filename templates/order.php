<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Order Calculator</title>
</head>

<body>

    <p>
        <a href="/">← Zurück zur Hauptseite</a>
    </p>

    <h1>Order Calculator</h1>

    <h2>Aufgabe</h2>

    <p>Berechnung des Gesamtpreises einer Bestellung unter Berücksichtigung von Rabatten.</p>

    <ul>
        <li>Regular-Kunde: 0 % Rabatt</li>
        <li>Premium-Kunde: 10 % Rabatt</li>
        <li>Bestellwert über 100 €: zusätzlich 5 % Rabatt</li>
        <li>Maximaler Rabatt: 15 %</li>
        <li>Preis und Menge müssen größer als 0 sein</li>
    </ul>

    <hr>

    <h2>Bestellung</h2>

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
            <label for="productPrice">Preis pro Stück:</label><br>
            <input
                type="number"
                id="productPrice"
                name="productPrice"
                step="0.01"
                min="0.01"
                value="<?= htmlspecialchars((string) $productPrice) ?>"
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
                value="<?= htmlspecialchars((string) $quantity) ?>"
                required>
        </p>

        <p>
            <label for="clientType">Kundentyp:</label><br>

            <select id="clientType" name="clientType">
                <option
                    value="regular"
                    <?= $clientType === 'regular' ? 'selected' : '' ?>>
                    Regular
                </option>

                <option
                    value="premium"
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
        <hr>

        <h2>Ergebnis</h2>

        <p>
            Gesamtpreis:
            <strong><?= number_format($resultPrice, 2, '.', '') ?> €</strong>
        </p>
    <?php endif; ?>

    <?php if ($error !== null): ?>
        <hr>

        <p>
            <strong>Fehler:</strong>
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

</body>

</html>