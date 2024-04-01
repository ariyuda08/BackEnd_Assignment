<?php
class Karyawan
{
    private $upah_per_jam;
    private $jam_kerja;

    public function __construct($upah_per_jam, $jam_kerja)
    {
        $this->upah_per_jam = $upah_per_jam;
        $this->jam_kerja = $jam_kerja;
    }

    public function hitungUpah()
    {
        if ($this->jam_kerja <= 48) {
            $upah_total = $this->upah_per_jam * $this->jam_kerja;
        } else {
            $jam_normal = 48;
            $jam_lembur = $this->jam_kerja - $jam_normal;
            $upah_total = ($this->upah_per_jam * $jam_normal) + ($this->upah_per_jam * 1.15 * $jam_lembur);
        }

        return $upah_total;
    }
}
?>
