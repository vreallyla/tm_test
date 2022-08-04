
-- QUERY MENYAJIKAN LAPORAN 10 TERBANYAK BERDASARKAN DEMOGRASI KOTA PASIEN
-- UNTUK DEFAULT LAPORAN DATA SAYA SET LOKASI SURABAYA PADA BULAN JULI 2021
-- JIKA MAU MENGUBAH WAKTU LAPORAN CUKUP UBAH QUERY WHERE UNTUK MENYESUAIKAN BULAN DAN TAHUN PADA LINE 29-30
-- JIKA MAU MENGUBAH KOTA PADA LAPORAN CUKUP GANTI WHERE mp.pasien_kota PADA LINE 28 SESUAI KEYWORD KOTA YANG ADA

select 
  ROW_NUMBER() OVER(
    ORDER BY 
      Jumlah DESC
  ) AS No, 
  Kota, 
  Diagnosa, 
  Jumlah 
from 
  (
    SELECT 
      mp.pasien_kota AS Kota, 
      CONCAT(
        md.diagnosa_kode, ' - ', md.diagnosa_name
      ) AS Diagnosa, 
      COUNT(diagnosapasien_id) Jumlah 
    FROM 
      diagnosa_pasien AS dp 
      JOIN kunjungan_pasien AS kp ON kp.pendaftaran_id = dp.kunjungan_id 
      LEFT JOIN master_diagnosa AS md ON md.diagnosa_id = dp.m_diagnosa_id 
      LEFT JOIN master_pasien AS mp ON mp.pasien_id = kp.m_pasien_id 
    WHERE 
      mp.pasien_kota='Surabaya'
      AND month(kp.daftar_tanggal)= 7 
      AND year(kp.daftar_tanggal)= 2021 
    GROUP BY 
      dp.m_diagnosa_id, 
      kp.m_pasien_id 
    ORDER BY 
      Jumlah DESC 
    LIMIT 
      100
  ) AS a;

