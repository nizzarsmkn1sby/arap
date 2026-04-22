<!DOCTYPE html>
<html>
<head>
    <title>Struk</title>
    <style>
        body { font-family: monospace; font-size: 12px; }
        .struk { width: 250px; }
        hr { border: 1px dashed black; }
    </style>
</head>
<body onload="window.print()">
    <div class="struk">
        <h3>TOKO KASIR</h3>
        <hr>

        <p>No: <?php echo e($transaction->transaction_number); ?></p>
        <p>Tanggal: <?php echo e(date('d-m-Y')); ?></p>

        <hr>
        <p>Total: Rp <?php echo e(number_format($transaction->total)); ?></p>

        <p>Terima kasih</p>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\lsp-kasir\lsp-kasir\resources\views/print.blade.php ENDPATH**/ ?>