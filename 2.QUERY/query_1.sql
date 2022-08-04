-- QUERY MENYAJIKAN LAPORAN 10 TERBANYAK SETIAP BULANNYA PER POLI / KLINIK
-- UNTUK DEFAULT LAPORAN DATA SAYA SET POLI MATA PADA BULAN JULI 2021
-- JIKA MAU MENGUBAH WAKTU LAPORAN CUKUP UBAH QUERY WHERE UNTUK MENYESUAIKAN BULAN DAN TAHUN PADA LINE 27-28
-- JIKA MAU MENGUBAH POLI PADA LAPORAN CUKUP GANTI WHERE mu.unit_kode PADA LINE 27 SESUAI DENGAN KODE DI TABEL master_unit
select 
  ROW_NUMBER() OVER(
    ORDER BY 
      Jumlah DESC
  ) AS No, 
  Poli, 
  Diagnosa, 
  Jumlah 
from 
  (
    SELECT 
      mu.unit_nama as Poli, 
      CONCAT(
        md.diagnosa_kode, ' - ', md.diagnosa_name
      ) as Diagnosa, 
      COUNT(diagnosapasien_id) AS Jumlah 
    FROM 
      diagnosa_pasien AS dp 
      JOIN kunjungan_pasien AS kp ON kp.pendaftaran_id = dp.kunjungan_id 
      LEFT JOIN master_diagnosa AS md ON md.diagnosa_id = dp.m_diagnosa_id 
      LEFT JOIN master_unit AS mu ON mu.unit_id = kp.m_unit_id 
    WHERE 
      mu.unit_kode='MAT'
      month(kp.daftar_tanggal)= 7 
      and year(kp.daftar_tanggal)= 2021 
    GROUP BY 
      dp.m_diagnosa_id, 
      kp.m_unit_id 
    ORDER BY 
      Jumlah DESC 
    LIMIT 
      10
  ) as a;

