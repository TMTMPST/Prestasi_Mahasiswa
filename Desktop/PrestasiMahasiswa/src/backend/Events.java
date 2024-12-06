/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package backend;

import java.sql.*;
import java.util.ArrayList;

/**
 *
 * @author BISMILLAH NAWAITU
 */
public class Events {
    private int id_event;
    private String nama_lomba, tgl_lomba, kategori_lomba, penyelenggara, lokasi, deskripsi, link;

    public Events() {
    }

    public Events(int id_event, String nama_lomba, String tgl_lomba, String kategori_lomba, String penyelenggara, String lokasi, String deskripsi, String link) {
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
    
    public Events getById(int id_event){
        Events evnt = new Events();
        ResultSet rs= DBHelper.selectQuery("SELECT * FROM EVENTS "
                                            + " WHERE id_event = '" + id_event + "'");
        
        try {
            while(rs.next()){
                evnt = new Events();
                evnt.setId_event(rs.getInt("id_event"));
                evnt.setNama_lomba(rs.getString("nama_event"));
                evnt.setTgl_lomba(rs.getString("tgl_lomba"));
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
    
    public void save(){
        if (getById(id_event).getId_event()== 0) {
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
        } else {
            String SQL = "UPDATE EVENTS SET"
                    + "nama_event = '" + this.nama_lomba + "', "
                    + "tgl_lomba = '" + this.tgl_lomba + "', "
                    + "kategori_lomba= '" + this.kategori_lomba + "', "
                    + "penyelenggara= '" + this.penyelenggara + "', "
                    + "lokasi= '" + this.lokasi + "', "
                    + "deskripsi= '" + this.deskripsi + "', "
                    + " link_lomba= '" + this.link + "', "
                    + " WHERE id_event = '" + this.id_event + "'";
            DBHelper.executeQuery(SQL);
        }
    }
    
    public void delete(){
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
                evnt.setTgl_lomba(rs.getString("tgl_lomba"));
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

    public String getTgl_lomba() {
        return tgl_lomba;
    }

    public void setTgl_lomba(String tgl_lomba) {
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