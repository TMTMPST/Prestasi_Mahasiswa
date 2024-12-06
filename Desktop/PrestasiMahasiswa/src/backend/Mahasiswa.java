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
public class Mahasiswa {

    private String NAMA, PRODI, EMAIL, PASSWORD, NIM, TGL_LAHIR, KELAMIN;

    public Mahasiswa() {
    }

    public Mahasiswa(String NAMA, String PRODI, String EMAIL, String PASSWORD, String NIM, String TGL_LAHIR, String KELAMIN) {
        this.NAMA = NAMA;
        this.PRODI = PRODI;
        this.EMAIL = EMAIL;
        this.PASSWORD = PASSWORD;
        this.NIM = NIM;
        this.TGL_LAHIR = TGL_LAHIR;
        this.KELAMIN = KELAMIN;
    }

    public String getNAMA() {
        return NAMA;
    }

    public void setNAMA(String NAMA) {
        this.NAMA = NAMA;
    }

    public String getPRODI() {
        return PRODI;
    }

    public void setPRODI(String PRODI) {
        this.PRODI = PRODI;
    }

    public String getEMAIL() {
        return EMAIL;
    }

    public void setEMAIL(String EMAIL) {
        this.EMAIL = EMAIL;
    }

    public String getPASSWORD() {
        return PASSWORD;
    }

    public void setPASSWORD(String PASSWORD) {
        this.PASSWORD = PASSWORD;
    }

    public String getNIM() {
        return NIM;
    }

    public void setNIM(String NIM) {
        this.NIM = NIM;
    }

    public String getTGL_LAHIR() {
        return TGL_LAHIR;
    }

    public void setTGL_LAHIR(String TGL_LAHIR) {
        this.TGL_LAHIR = TGL_LAHIR;
    }

    public String getKELAMIN() {
        return KELAMIN;
    }

    public void setKELAMIN(String KELAMIN) {
        this.KELAMIN = KELAMIN;
    }

    private Mahasiswa setMahasiswa(ResultSet rs) {
        Mahasiswa mhs = new Mahasiswa();
//        NAMA, PRODI, EMAIL, PASSWORD, NIM, TGL_LAHIR, KELAMIN
        try {
            mhs.setNAMA(rs.getString("NAMA"));
            mhs.setPRODI(rs.getString("PRODI"));
            mhs.setEMAIL(rs.getString("EMAIL"));
            mhs.setPASSWORD(rs.getString("PASSWORD"));
            mhs.setNIM(rs.getString("NIM"));
            mhs.setTGL_LAHIR(rs.getString("TGL_LAHIR"));
            mhs.setKELAMIN(rs.getString("KELAMIN"));
        } catch (SQLException ex) {
            Logger.getLogger(Mahasiswa.class.getName()).log(Level.SEVERE, null, ex);
        }
        return mhs;
    }

    public Mahasiswa getById(String id) {
        Mahasiswa mhs = new Mahasiswa();
        ResultSet rs = DBHelper.selectQuery("SELECT * FROM MAHASISWA "
                + "WHERE NIM = '" + id + "'");

        try {
            while (rs.next()) {
                mhs = setMahasiswa(rs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return mhs;
    }

    public ArrayList<Mahasiswa> getAll() {
        ArrayList<Mahasiswa> ListMahasiswa = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM MAHASISWA");

        try {
            while (rs.next()) {
                Mahasiswa mhs = setMahasiswa(rs);

                ListMahasiswa.add(mhs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListMahasiswa;
    }
    
    public ArrayList<Mahasiswa> search(String keyword) {
        ArrayList<Mahasiswa> ListMahasiswa = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM MAHASISWA WHERE"
                + " NIM LIKE '%" + keyword + "%'"
                + " OR PRODI LIKE '%" + keyword + "%'"
                + " OR EMAIL LIKE '%" + keyword + "%'"
                + " OR NIM LIKE '%" + keyword + "%'"
                + " OR KELAMIN LIKE '%" + keyword + "%'"
                + " OR TGL_LAHIR LIKE '%" + keyword + "%'");

        try {
            while (rs.next()) {
                Mahasiswa mhs = setMahasiswa(rs);

                ListMahasiswa.add(mhs);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListMahasiswa;
    }

    public void save() {
        if (getById(NIM).getNIM() == null) {
            String SQL = "INSERT INTO MAHASISWA (NAMA, PRODI, EMAIL, PASSWORD, NIM, TGL_LAHIR, KELAMIN) VALUES("
                    + "'" + this.NAMA + "', "
                    + "'" + this.PRODI + "', "
                    + "'" + this.EMAIL + "', "
                    + "'" + this.PASSWORD + "', "
                    + "'" + this.NIM + "', "
                    + "'" + this.TGL_LAHIR + "', "
                    + "'" + this.KELAMIN + "')";
            this.NIM = String.valueOf(DBHelper.insertQueryGetId(SQL));
        } else {
            String SQL = "UPDATE MAHASISWA SET "
                    + "NAMA = '" + this.NAMA + "', "
                    + "PRODI = '" + this.PRODI + "', "
                    + "EMAIL = '" + this.EMAIL + "', "
                    + "PASSWORD = '" + this.PASSWORD + "', "
                    + "TGL_LAHIR = '" + this.TGL_LAHIR + "', "
                    + "KELAMIN = '" + this.KELAMIN + "' "
                    + "WHERE NIM = '" + this.NIM + "';";
            DBHelper.executeQuery(SQL);
        }
    }

    public void delete() {
        String SQL = "DELETE FROM MAHASISWA "
                + "WHERE NIM = '" + this.NIM + "'";
        DBHelper.executeQuery(SQL);
    }
}
