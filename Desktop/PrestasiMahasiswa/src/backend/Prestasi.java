/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package backend;

import java.sql.ResultSet;
import java.util.ArrayList;

/**
 *
 * @author TNCP
 */
public class Prestasi {
    private int ID_PRESTASI;
    private String NIM, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, PENYELENGGARA, BUKTI_PRESTASI, STATUS;

    public Prestasi() {
    }

    public Prestasi(String NIM, String JENIS_PRESTASI, String NAMA_LOMBA, String PERINGKAT) {
        this.NIM = NIM;
        this.JENIS_PRESTASI = JENIS_PRESTASI;
        this.NAMA_LOMBA = NAMA_LOMBA;
        this.PERINGKAT = PERINGKAT;
    }

    public Prestasi(String NIM, String JENIS_PRESTASI, String NAMA_LOMBA, String PERINGKAT, String PENYELENGGARA, String BUKTI_PRESTASI, String STATUS) {
        this.NIM = NIM;
        this.JENIS_PRESTASI = JENIS_PRESTASI;
        this.NAMA_LOMBA = NAMA_LOMBA;
        this.PERINGKAT = PERINGKAT;
        this.PENYELENGGARA = PENYELENGGARA;
        this.BUKTI_PRESTASI = BUKTI_PRESTASI;
        this.STATUS = STATUS;
    }

    public int getID_PRESTASI() {
        return ID_PRESTASI;
    }

    public void setID_PRESTASI(int ID_PRESTASI) {
        this.ID_PRESTASI = ID_PRESTASI;
    }

    public String getBUKTI_PRESTASI() {
        return BUKTI_PRESTASI;
    }

    public void setBUKTI_PRESTASI(String BUKTI_PRESTASI) {
        this.BUKTI_PRESTASI = BUKTI_PRESTASI;
    }

    public String getPENYELENGGARA() {
        return PENYELENGGARA;
    }

    public void setPENYELENGGARA(String PENYELENGGARA) {
        this.PENYELENGGARA = PENYELENGGARA;
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

    public String getSTATUS() {
        return STATUS;
    }

    public void setSTATUS(String STATUS) {
        this.STATUS = STATUS;
    }
    
    public Prestasi getById(int id) {
        Prestasi prs = new Prestasi();
        ResultSet rs = DBHelper.selectQuery("SELECT * FROM PRESTASI " + 
                                            "WHERE ID_PRESTASI = '" + id + "'");
        
        try {
            while (rs.next()) {                
                prs = new Prestasi();
                prs.setID_PRESTASI(rs.getInt("ID_PRESTASI"));
                prs.setNIM(rs.getString("NIM"));
                prs.setPERINGKAT(rs.getString("PERINGKAT"));
                prs.setNAMA_LOMBA(rs.getString("NAMA_LOMBA"));
                prs.setJENIS_PRESTASI(rs.getString("JENIS_PRESTASI"));
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
                prs.setID_PRESTASI(rs.getInt("ID_PRESTASI"));
                prs.setNIM(rs.getString("NIM"));
                prs.setPERINGKAT(rs.getString("PERINGKAT"));
                prs.setNAMA_LOMBA(rs.getString("NAMA_LOMBA"));
                prs.setJENIS_PRESTASI(rs.getString("JENIS_PRESTASI"));

                ListPrestasi.add(prs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListPrestasi;
    }
    
    public void save() {
        if (getById(ID_PRESTASI).getID_PRESTASI()== 0) {
            String SQL = "INSERT INTO PRESTASI (NIM, PERINGKAT, NAMA_LOMBA, JENIS_PRESTASI) VALUES("
                    + "'" + this.NIM + "', "
                    + "'" + this.PERINGKAT + "', "
                    + "'" + this.NAMA_LOMBA + "',"
                    + "'" + this.JENIS_PRESTASI + "')";
            this.ID_PRESTASI = DBHelper.insertQueryGetId(SQL);
        } else {
            String SQL = "UPDATE PRESTASI SET "
                    + "NIM = '" + this.NIM + "', "
                    + "PERINGKAT = '" + this.PERINGKAT + "', "
                    + "NAMA_LOMBA = '" + this.NAMA_LOMBA + "', "
                    + "JENIS_PRESTASI = '" + this.JENIS_PRESTASI + "' "
                    + "WHERE idAnggota = '" + this.ID_PRESTASI + "'";
            DBHelper.executeQuery(SQL);
        }
    }

    public void delete() {
        String SQL = "DELETE FROM PRESTASI "
                + "WHERE ID_PRESTASI = '" + this.ID_PRESTASI + "'";
        DBHelper.executeQuery(SQL);
    }
}
