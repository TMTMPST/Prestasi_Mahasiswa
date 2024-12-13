/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package backend;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;

/**
 *
 * @author TNCP
 */
public class FileHandler {
    public boolean saveFileToServer(File file) {
        File destinationDir = new File("C:/path/to/your/directory"); // Ganti dengan folder tujuan
        if (!destinationDir.exists()) {
            destinationDir.mkdirs();
        }
        File destinationFile = new File(destinationDir, file.getName());

        try (InputStream in = new FileInputStream(file);
             OutputStream out = new FileOutputStream(destinationFile)) {
            
            byte[] buffer = new byte[1024];
            int length;
            while ((length = in.read(buffer)) > 0) {
                out.write(buffer, 0, length);
            }
            return true;
        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    }
}
