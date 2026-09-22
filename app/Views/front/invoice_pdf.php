<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; color: #251d18; font-size: 13px; }
        h1 { color: #553d2a; margin-bottom: 0; }
        .subtitulo { color: #7e634e; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #735945; color: #fff9e1; padding: 8px; text-align: left; }
        td { padding: 8px; border-bottom: 1px solid #e3d7bf; }
        .total { text-align: right; font-size: 16px; font-weight: bold; margin-top: 15px; color: #553d2a; }
        .aviso { margin-top: 30px; font-size: 11px; color: #7e634e; }
    </style>
</head>
<body>
    <h1>Prime Shoes</h1>
    <p class="subtitulo">Comprobante de compra - Factura #<?= esc($venta['id_venta']) ?></p>
    <p>Fecha: <?= esc($venta['created_at']) ?></p>

    <p><strong>Cliente:</strong> <?= esc($venta['nombre'] . ' ' . $venta['apellido']) ?></p>
    <p><strong>DNI:</strong> <?= esc($venta['dni']) ?> — <strong>Email:</strong> <?= esc($venta['email']) ?></p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unit.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venta['detalle'] as $item) : ?>
                <tr>
                    <td><?= esc($item['nombre']) ?></td>
                    <td><?= esc($item['qty']) ?></td>
                    <td>$ <?= number_format($item['precio'], 0, ',', '.') ?></td>
                    <td>$ <?= number_format($item['precio'] * $item['qty'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p class="total">Total: $ <?= number_format($venta['total_venta'], 0, ',', '.') ?></p>

    <p class="aviso">* Comprobante representativo, sin validez fiscal.</p>
</body>
</html>