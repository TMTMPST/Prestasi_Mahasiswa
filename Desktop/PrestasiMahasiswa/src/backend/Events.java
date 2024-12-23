/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package backend;

import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.Date;

/**
 *
 * @author BISMILLAH NAWAITU
 */
public class Events {

    private int id_event;
    private String nama_lomba, kategori_lomba, penyelenggara, lokasi, deskripsi, link;
    private Date tgl_lomba;

    public Events() {
    }

    public Events(int id_event, String nama_lomba, Date tgl_lomba, String kategori_lomba, String penyelenggara, String lokasi, String deskripsi, String link) {
        this.id_event = id_event;
        this.nama_lomba = nama_lomba;
        this.tgl_lomba = tgl_lomba;
        this.kategori_lomba = kategori_lomba;
        this.penyelenggara = penyelenggara;
        this.lokasi = lokasi;
        this.deskripsi = deskripsi;
        this.link = link;
    }

    public String getKategori_lomba() {
        return kategori_lomba;
    }

    public void setKategori_lomba(String kategori_lomba) {
        this.kategori_lomba = kategori_lomba;
    }

    public Events getById(int id_event) {
        Events evnt = new Events();
        ResultSet rs = DBHelper.selectQuery("SELECT * FROM EVENTS "
                + " WHERE id_event = '" + id_event + "'");

        try {
            while (rs.next()) {
                evnt = new Events();
                evnt.setId_event(rs.getInt("id_event"));
                evnt.setNama_lomba(rs.getString("nama_event"));
                evnt.setTgl_lomba(rs.getDate("tgl_lomba"));
                evnt.setKategori(rs.getString("kategori_lomba"));
                evnt.setPenyelenggara(rs.getString("penyelenggara"));
                evnt.setLokasi(rs.getString("lokasi"));
                evnt.setDeskripsi(rs.getString("deskripsi"));
                evnt.setLink(rs.getString("link_lomba"));
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return evnt;
    }

    public void save() {
        String SQL = "INSERT INTO EVENTS (nama_event, tgl_lomba, kategori_lomba, penyelenggara, lokasi, deskripsi, link_lomba) VALUES("
                + " '" + this.nama_lomba + "', "
                + " '" + this.tgl_lomba + "', "
                + " '" + this.kategori_lomba + "', "
                + " '" + this.penyelenggara + "', "
                + " '" + this.lokasi + "', "
                + " '" + this.deskripsi + "', "
                + " '" + this.link + "' "
                + " )";
        this.id_event = DBHelper.insertQueryGetId(SQL);
    }

    public void edit() {
        String SQL = "UPDATE EVENTS SET "
                + "nama_event = '" + this.nama_lomba + "', "
                + "tgl_lomba = '" + this.tgl_lomba + "', "
                + "kategori_lomba= '" + this.kategori_lomba + "', "
                + "penyelenggara= '" + this.penyelenggara + "', "
                + "lokasi= '" + this.lokasi + "', "
                + "deskripsi= '" + this.deskripsi + "', "
                + " link_lomba= '" + this.link + "' "
                + " WHERE id_event = " + this.id_event + ";";
        DBHelper.executeQuery(SQL);
        System.out.println(id_event);
        System.out.println(tgl_lomba);
    }

    public void delete() {
        String SQL = "DELETE FROM EVENTS WHERE id_event = '" + this.id_event + "'";
        DBHelper.executeQuery(SQL);
    }

    public ArrayList<Events> getAll() {
        ArrayList<Events> ListEvent = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM EVENTS");

        try {
            while (rs.next()) {
                Events evnt = new Events();
                evnt.setId_event(rs.getInt("id_event"));
                evnt.setNama_lomba(rs.getString("nama_event"));
                evnt.setTgl_lomba(rs.getDate("tgl_lomba"));
                evnt.setKategori(rs.getString("kategori_lomba"));
                evnt.setPenyelenggara(rs.getString("penyelenggara"));
                evnt.setLokasi(rs.getString("lokasi"));
                evnt.setDeskripsi(rs.getString("deskripsi"));
                evnt.setLink(rs.getString("link_lomba"));

                ListEvent.add(evnt);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListEvent;
    }

    public ArrayList<Events> search(String keyword) {
        ArrayList<Events> ListPrestasi = new ArrayList();

        ResultSet rs = DBHelper.selectQuery("SELECT * FROM EVENTS WHERE"
                + " nama_event LIKE '%" + keyword + "%'"
                + " OR kategori_lomba LIKE '%" + keyword + "%'"
                + " OR penyelenggara LIKE '%" + keyword + "%'"
                + " OR lokasi LIKE '%" + keyword + "%'"
                + " OR deskripsi LIKE '%" + keyword + "%'"
                + " OR link_lomba LIKE '%" + keyword + "%'");

        try {
            Events evnt = new Events();
            while (rs.next()) {
                evnt.setId_event(rs.getInt("id_event"));
                evnt.setNama_lomba(rs.getString("nama_event"));
                evnt.setTgl_lomba(rs.getDate("tgl_lomba"));
                evnt.setKategori(rs.getString("kategori_lomba"));
                evnt.setPenyelenggara(rs.getString("penyelenggara"));
                evnt.setLokasi(rs.getString("lokasi"));
                evnt.setDeskripsi(rs.getString("deskripsi"));
                evnt.setLink(rs.getString("link_lomba"));

                ListPrestasi.add(evnt);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }

        return ListPrestasi;
    }

    public int getId_event() {
        return id_event;
    }

    public void setId_event(int id_event) {
        this.id_event = id_event;
    }

    public String getNama_lomba() {
        return nama_lomba;
    }

    public void setNama_lomba(String nama_lomba) {
        this.nama_lomba = nama_lomba;
    }

    public Date getTgl_lomba() {
        return tgl_lomba;
    }

    public void setTgl_lomba(Date tgl_lomba) {
        this.tgl_lomba = tgl_lomba;
    }

    public String getKategori() {
        return kategori_lomba;
    }

    public void setKategori(String kategori) {
        this.kategori_lomba = kategori;
    }

    public String getPenyelenggara() {
        return penyelenggara;
    }

    public void setPenyelenggara(String penyelenggara) {
        this.penyelenggara = penyelenggara;
    }

    public String getLokasi() {
        return lokasi;
    }

    public void setLokasi(String lokasi) {
        this.lokasi = lokasi;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getLink() {
        return link;
    }

    public void setLink(String link) {
        this.link = link;
    }
}
