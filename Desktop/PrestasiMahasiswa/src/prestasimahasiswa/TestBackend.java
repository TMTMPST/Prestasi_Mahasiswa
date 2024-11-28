/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package prestasimahasiswa;

import backend.*;

/**
 *
 * @author TNCP
 */
public class TestBackend {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        for (Prestasi a : new Prestasi().getAll()) {
            System.out.println("Nama: " + a.getNIM());
            System.out.println("Juara: " + a.getPERINGKAT());
            System.out.println("Lomba: " + a.getNAMA_LOMBA());
            System.out.println("Tingkatan: " + a.getJENIS_PRESTASI());
        }
    }
    
}
