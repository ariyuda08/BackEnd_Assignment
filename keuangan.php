<?php
class Keuangan
{
    public static function formatUpah($upah)
    {
        return "Rp " . number_format($upah, 0, ',', '.');
    }
}
?>
