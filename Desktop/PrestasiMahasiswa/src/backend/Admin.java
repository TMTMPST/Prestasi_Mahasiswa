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
public class Admin {
    private int ID_ADMIN;
    private String USERNAME, PASSWORD_ADMIN, NAMA_ADMIN;

    public Admin() {
    }

    public Admin(String USERNAME, String PASSWORD_ADMIN, String NAMA_ADMIN) {
        this.USERNAME = USERNAME;
        this.PASSWORD_ADMIN = PASSWORD_ADMIN;
        this.NAMA_ADMIN = NAMA_ADMIN;
    }

    public Admin(int ID_ADMIN, String USERNAME, String PASSWORD_ADMIN, String NAMA_ADMIN) {
        this.ID_ADMIN = ID_ADMIN;
        this.USERNAME = USERNAME;
        this.PASSWORD_ADMIN = PASSWORD_ADMIN;
        this.NAMA_ADMIN = NAMA_ADMIN;
    }

    public int getID_ADMIN() {
        return ID_ADMIN;
    }

    public void setID_ADMIN(int ID_ADMIN) {
        this.ID_ADMIN = ID_ADMIN;
    }

    public String getUSERNAME() {
        return USERNAME;
    }

    public void setUSERNAME(String USERNAME) {
        this.USERNAME = USERNAME;
    }

    public String getPASSWORD_ADMIN() {
        return PASSWORD_ADMIN;
    }

    public void setPASSWORD_ADMIN(String PASSWORD_ADMIN) {
        this.PASSWORD_ADMIN = PASSWORD_ADMIN;
    }

    public String getNAMA_ADMIN() {
        return NAMA_ADMIN;
    }

    public void setNAMA_ADMIN(String NAMA_ADMIN) {
        this.NAMA_ADMIN = NAMA_ADMIN;
    }

    

    public Admin getById(int id) {
        Admin adm = new Admin();
        ResultSet rs = DBHelper.selectQuery("SELECT * FROM ADMIN "
                + "WHERE ID_ADMIN = '" + id + "'");

        try {
            while (rs.next()) {
                adm = new Admin();
                adm.setID_ADMIN(rs.getInt("ID_ADMIN"));
                adm.setNAMA_ADMIN(rs.getString("NAMA_ADMIN"));
                adm.setPASSWORD_ADMIN(rs.getString("PASSWORD_ADMIN"));
                adm.setUSERNAME(rs.getString("USERNAME"));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return adm;
    }

    public ArrayList<Admin> getAll() {
        ArrayList<Admin> ListAdmin = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM ADMIN");

        try {
            while (rs.next()) {
                Admin adm = new Admin();
                adm.setID_ADMIN(rs.getInt("ID_ADMIN"));
                adm.setNAMA_ADMIN(rs.getString("NAMA_ADMIN"));
                adm.setPASSWORD_ADMIN(rs.getString("PASSWORD_ADMIN"));
                adm.setUSERNAME(rs.getString("USERNAME"));

                ListAdmin.add(adm);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListAdmin;
    }

    public ArrayList<Admin> search(String keyword) {
        ArrayList<Admin> ListAdmin = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM ADMIN WHERE"
                + " NAMA_ADMIN LIKE '%" + keyword + "%'"
                + " OR USERNAME LIKE '%" + keyword + "%'");

        try {
            while (rs.next()) {
                Admin adm = new Admin();
                adm.setNAMA_ADMIN(rs.getString("NAMA_ADMIN"));
                adm.setUSERNAME(rs.getString("USERNAME"));

                ListAdmin.add(adm);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListAdmin;
    }

    public void save() {
        if (getById(ID_ADMIN).getID_ADMIN()== 0) {
            String SQL = "INSERT INTO ADMIN (NAMA_ADMIN, USERNAME, PASSWORD_ADMIN) VALUES("
                    + "'" + this.NAMA_ADMIN + "', "
                    + "'" + this.USERNAME + "',"
                    + "'" + this.PASSWORD_ADMIN + "')";
            this.ID_ADMIN = DBHelper.insertQueryGetId(SQL);
        } else {
            String SQL = "UPDATE ADMIN SET "
                    + "NAMA_ADMIN = '" + this.NAMA_ADMIN + "', "
                    + "USERNAME = '" + this.USERNAME + "', "
                    + "PASSWORD_ADMIN = '" + this.PASSWORD_ADMIN + "' "
                    + "WHERE ID_ADMIN = '" + this.ID_ADMIN + "'";
            DBHelper.executeQuery(SQL);
        }
    }

    public void delete() {
        String SQL = "DELETE FROM ADMIN "
                + "WHERE ID_ADMIN = '" + this.ID_ADMIN + "'";
        DBHelper.executeQuery(SQL);
    }

    public boolean authentication(String uname, String pw) {
        try {
            ResultSet rs = DBHelper.selectQuery("SELECT * FROM ADMIN "
                    + "WHERE USERNAME = '" + uname + "' AND "
                            + "PASSWORD_ADMIN = '" + pw + "';");
            
            return rs.next();
        } catch (SQLException ex) {
            Logger.getLogger(Admin.class.getName()).log(Level.SEVERE, null, ex);
            return false;
        }
    }
}
