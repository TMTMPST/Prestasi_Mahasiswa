/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package backend;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author TNCP
 */
public class Prestasi {

    private int ID_PRESTASI, ID_TINGKAT;
    private String NIM, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, STATUS,
            tanggal_lomba, sertifikat, proposal, surat_tugas, karya, DOSEN;

    public Prestasi() {
    }

    public Prestasi(String NIM, String JENIS_PRESTASI, String NAMA_LOMBA, String PERINGKAT) {
        this.NIM = NIM;
        this.JENIS_PRESTASI = JENIS_PRESTASI;
        this.NAMA_LOMBA = NAMA_LOMBA;
        this.PERINGKAT = PERINGKAT;
    }

    public Prestasi(String NIM, int ID_TINGKAT, String JENIS_PRESTASI, String NAMA_LOMBA, String PERINGKAT, String STATUS, String tanggal_lomba, String sertifikat, String proposal, String surat_tugas, String karya, String DOSEN) {
        this.NIM = NIM;
        this.ID_TINGKAT = ID_TINGKAT;
        this.JENIS_PRESTASI = JENIS_PRESTASI;
        this.NAMA_LOMBA = NAMA_LOMBA;
        this.PERINGKAT = PERINGKAT;
        this.STATUS = STATUS;
        this.tanggal_lomba = tanggal_lomba;
        this.sertifikat = sertifikat;
        this.proposal = proposal;
        this.surat_tugas = surat_tugas;
        this.karya = karya;
        this.DOSEN = DOSEN;
    }

    public int getID_TINGKAT() {
        return ID_TINGKAT;
    }

    public void setID_TINGKAT(int ID_TINGKAT) {
        this.ID_TINGKAT = ID_TINGKAT;
    }

    public String getTanggal_lomba() {
        return tanggal_lomba;
    }

    public void setTanggal_lomba(String tanggal_lomba) {
        this.tanggal_lomba = tanggal_lomba;
    }

    public String getSertifikat() {
        return sertifikat;
    }

    public void setSertifikat(String sertifikat) {
        this.sertifikat = sertifikat;
    }

    public String getProposal() {
        return proposal;
    }

    public void setProposal(String proposal) {
        this.proposal = proposal;
    }

    public String getSurat_tugas() {
        return surat_tugas;
    }

    public void setSurat_tugas(String surat_tugas) {
        this.surat_tugas = surat_tugas;
    }

    public String getKarya() {
        return karya;
    }

    public void setKarya(String karya) {
        this.karya = karya;
    }

    public int getID_PRESTASI() {
        return ID_PRESTASI;
    }

    public void setID_PRESTASI(int ID_PRESTASI) {
        this.ID_PRESTASI = ID_PRESTASI;
    }

    public String getSTATUS() {
        return STATUS;
    }

    public void setSTATUS(String STATUS) {
        this.STATUS = STATUS;
    }

    public String getDOSEN() {
        return DOSEN;
    }

    public void setDOSEN(String DOSEN) {
        this.DOSEN = DOSEN;
    }

    public String getNIM() {
        return NIM;
    }

    public void setNIM(String NIM) {
        this.NIM = NIM;
    }

    public String getJENIS_PRESTASI() {
        return JENIS_PRESTASI;
    }

    public void setJENIS_PRESTASI(String JENIS_PRESTASI) {
        this.JENIS_PRESTASI = JENIS_PRESTASI;
    }

    public String getNAMA_LOMBA() {
        return NAMA_LOMBA;
    }

    public void setNAMA_LOMBA(String NAMA_LOMBA) {
        this.NAMA_LOMBA = NAMA_LOMBA;
    }

    public String getPERINGKAT() {
        return PERINGKAT;
    }

    public void setPERINGKAT(String PERINGKAT) {
        this.PERINGKAT = PERINGKAT;
    }

    public Prestasi setPrestasi(ResultSet rs) {
        Prestasi prs = new Prestasi();
        try {
            prs.setID_PRESTASI(rs.getInt("ID_PRESTASI"));
            prs.setNIM(rs.getString("NIM"));
            prs.setID_TINGKAT(rs.getInt("ID_TINGKAT"));
            prs.setJENIS_PRESTASI(rs.getString("JENIS_PRESTASI"));
            prs.setNAMA_LOMBA(rs.getString("NAMA_LOMBA"));
            prs.setPERINGKAT(rs.getString("PERINGKAT"));
            prs.setSTATUS(rs.getString("STATUS"));
            prs.setTanggal_lomba(rs.getString("tanggal_lomba"));
            prs.setSertifikat(rs.getString("sertifikat"));
            prs.setProposal(rs.getString("proposal"));
            prs.setSurat_tugas(rs.getString("surat_tugas"));
            prs.setKarya(rs.getString("karya"));
            prs.setDOSEN(rs.getString("DOSEN"));
        } catch (SQLException ex) {
            Logger.getLogger(Prestasi.class.getName()).log(Level.SEVERE, null, ex);
        }
        return prs;
    }

    public Prestasi getById(int id) {
        Prestasi prs = new Prestasi();
        ResultSet rs = DBHelper.selectQuery("SELECT * FROM PRESTASI "
                + "WHERE ID_PRESTASI = " + id);

        try {
            while (rs.next()) {
//              NIM, ID_TINGKAT, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT,
//              STATUS, tanggal_lomba, sertifikat, proposal, surat_tugas, karya, DOSEN;
                prs = setPrestasi(rs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return prs;
    }

    public ArrayList<Prestasi> getAll() {
        ArrayList<Prestasi> ListPrestasi = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM PRESTASI");

        try {
            while (rs.next()) {
                Prestasi prs = new Prestasi();
                prs = setPrestasi(rs);

                ListPrestasi.add(prs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListPrestasi;
    }

    public ArrayList<Prestasi> search(String keyword) {
        ArrayList<Prestasi> ListPrestasi = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM PRESTASI WHERE"
                + " NIM LIKE '%" + keyword + "%'"
                + " OR PERINGKAT LIKE '%" + keyword + "%'"
                + " OR NAMA_LOMBA LIKE '%" + keyword + "%'"
                + " OR DOSEN LIKE '%" + keyword + "%'"
                + " OR JENIS_PRESTASI LIKE '%" + keyword + "%'");

        try {
            while (rs.next()) {
                Prestasi prs = new Prestasi();
                prs = setPrestasi(rs);

                ListPrestasi.add(prs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListPrestasi;
    }

    public void save() {
        String SQL = "INSERT INTO PRESTASI (NIM, ID_TINGKAT, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, STATUS, tanggal_lomba, DOSEN, sertifikat, proposal, surat_tugas, karya) VALUES("
                + "'" + this.NIM + "', "
                + " " + this.ID_TINGKAT + ", "
                + "'" + this.JENIS_PRESTASI + "', "
                + "'" + this.NAMA_LOMBA + "', "
                + "'" + this.PERINGKAT + "', "
                + "'" + this.STATUS + "', "
                + "'" + this.tanggal_lomba + "', "
                + "'" + this.DOSEN + "',"
                + "'" + this.sertifikat + "',"
                + "'" + this.proposal + "',"
                + "'" + this.surat_tugas + "',"
                + "'" + this.karya + "')";
        this.ID_PRESTASI = DBHelper.insertQueryGetId(SQL);
        System.out.println("INSERT berhasil");
    }

    public void edit() {
        String SQL = "UPDATE PRESTASI SET "
                + "NIM = '" + this.NIM + "', "
                + "JENIS_PRESTASI = '" + this.JENIS_PRESTASI + "', "
                + "NAMA_LOMBA = '" + this.NAMA_LOMBA + "', "
                + "PERINGKAT = '" + this.PERINGKAT + "', "
                + "STATUS = '" + this.STATUS + "', "
                + "tanggal_lomba = '" + this.tanggal_lomba + "', "
                + "DOSEN = '" + this.DOSEN + "', "
                + "sertifikat = '" + this.sertifikat + "', "
                + "proposal = '" + this.proposal + "', "
                + "surat_tugas = '" + this.surat_tugas + "', "
                + "karya = '" + this.karya + "', "
                + "ID_TINGKAT = '" + this.ID_TINGKAT + "' "
                + "WHERE ID_PRESTASI = " + this.ID_PRESTASI + ";";
        DBHelper.executeQuery(SQL);
        System.out.println("UPDATE BERHASIL");
        System.out.println(DOSEN);
        System.out.println(ID_PRESTASI);
    }

    public void delete() {
        String SQL = "DELETE FROM PRESTASI "
                + "WHERE ID_PRESTASI = '" + this.ID_PRESTASI + "'";
        DBHelper.executeQuery(SQL);
    }
}
