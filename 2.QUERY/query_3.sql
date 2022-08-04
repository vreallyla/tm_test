
-- QUERY MENYAJIKAN LAPORAN POLI BERDASARKAN JADWAL
-- UNTUK DEFAULT LAPORAN DATA SAYA SET KE POLI MATA DENGAN PEMBAYARAN UMUM PADA PADA TANGGAL 7 JUL 2021
-- JIKA MAU MENGUBAH TANGGAL MASUK LAPORAN CUKUP UBAH QUERY WHERE UNTUK PADA LINE 71
-- JIKA MAU MENGUBAH POLI PADA LAPORAN CUKUP GANTI WHERE mu.unit_kode PADA LINE 72 SESUAI DENGAN KODE DI TABEL master_unit
-- JIKA MAU MENGUBAH PEMBAYARAN PADA LAPORAN CUKUP GANTI WHERE mu.unit_kode PADA LINE 73 SESUAI DENGAN KODE DI TABEL master_pembayaran
-- NOTE: UNTUK DIAGNOSA SAYA CONCAT JADI STRING SUPAYA DAPAT MENAMPILKAN JADWAL 1 BARIS

with base as (
  SELECT 
    dp1.*, 
    kp.m_pasien_id, 
    kp.m_unit_id, 
    m_bayar_id, 
    kp.daftar_tanggal, 
    kp.pulang_tanggal, 
    Mdok.pegawai_nama Dokter 
  FROM 
    diagnosa_pasien AS dp1 
    JOIN kunjungan_pasien AS kp ON kp.pendaftaran_id = dp1.kunjungan_id 
    LEFT JOIN master_dokter AS mdok ON mdok.pegawai_id = kp.m_dokter_id 
  ORDER BY 
    kp.daftar_tanggal ASC, 
    dp1.diagnosapasien_jenis DESC
) 
SELECT 
  ROW_NUMBER() OVER(
    ORDER BY 
      `tanggal masuk` DESC
  ) AS No, 
  A.* 
FROM 
  (
    SELECT 
      mu.unit_nama AS Poli, 
      mp.pasien_nama AS 'Nama Pasien', 
      mp.pasien_alamat AS Alamat, 
      mpem.bayar_nama AS 'Cara Bayar', 
      group_concat(
        concat(
          @i := if (
            @grp = dp.kunjungan_id, 
            @i + 1, 
            if(@grp := dp.kunjungan_id, 1, 1)
          ), 
          '. ', 
          md.diagnosa_kode, 
          ' - ', 
          md.diagnosa_name
        ) separator ' | '
      ) as Diagnosa, 
      dp.Dokter, 
      DATE_FORMAT(
        dp.daftar_tanggal, '%d %b %Y %H:%i:%s'
      ) as 'tanggal masuk', 
      DATE_FORMAT(
        dp.pulang_tanggal, '%d %b %Y %H:%i:%s'
      ) as 'tanggal pulang' 
    FROM 
      base AS dp 
      LEFT JOIN master_diagnosa AS md ON md.diagnosa_id = dp.m_diagnosa_id 
      LEFT JOIN master_pasien AS mp ON mp.pasien_id = dp.m_pasien_id 
      LEFT JOIN master_unit AS mu ON mu.unit_id = dp.m_unit_id 
      LEFT JOIN master_pembayaran AS mpem ON mpem.bayar_id = dp.m_bayar_id, 
      (
        SELECT 
          @i := 0, 
          @grp = NULL
      ) numbers 
    WHERE 
      DATE(dp.daftar_tanggal)= '2021-07-05' 
      AND mu.unit_kode = 'MAT' 
      AND mpem.bayar_kode = 'UM' 
    GROUP BY 
      dp.kunjungan_id 
    ORDER BY 
      dp.daftar_tanggal
  ) AS A;
