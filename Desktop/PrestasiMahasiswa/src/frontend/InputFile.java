/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package frontend;

import backend.Prestasi;
import java.awt.Image;
import javax.swing.JFileChooser;
import javax.swing.JOptionPane;
import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.Date;
import javax.swing.ImageIcon;
import javax.swing.JLabel;
import javax.swing.JScrollPane;
import javax.swing.filechooser.FileNameExtensionFilter;

/**
 *
 * @author USER
 */
public class InputFile extends javax.swing.JFrame {
//    NIM, ID_TINGKAT, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, STATUS, tanggal_lomba, DOSEN, sertifikat, proposal, surat_tugas, karya

    private int ID_TINGKAT, id_prestasi;
    private String NIM, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, STATUS, DOSEN, path1, path2, path3, path4;
    private boolean edit;
    private Date tanggal_lomba;

    /**
     * Creates new form InputFile
     */
    public InputFile() {
        initComponents();
    }

    public InputFile(
            String NIM, int ID_TINGKAT, String JENIS_PRESTASI, String NAMA_LOMBA, String PERINGKAT,
            String STATUS, Date tanggal_lomba, String DOSEN, boolean edit, int id_prestasi,
            String sertifikat, String proposal, String surat_tugas, String karya) {
        initComponents();
        this.NIM = NIM;
        this.ID_TINGKAT = ID_TINGKAT;
        this.JENIS_PRESTASI = JENIS_PRESTASI;
        this.NAMA_LOMBA = NAMA_LOMBA;
        this.PERINGKAT = PERINGKAT;
        this.STATUS = STATUS;
        this.tanggal_lomba = tanggal_lomba;
        this.DOSEN = DOSEN;
        this.edit = edit;
        this.id_prestasi = id_prestasi;
        path1 = sertifikat;
        path2 = proposal;
        path3 = surat_tugas;
        path4 = karya;
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jFileChooser1 = new javax.swing.JFileChooser();
        jPanel1 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        btnFile1 = new javax.swing.JButton();
        btnShow1 = new javax.swing.JButton();
        jPanel3 = new javax.swing.JPanel();
        jLabel2 = new javax.swing.JLabel();
        btnFile2 = new javax.swing.JButton();
        btnShow2 = new javax.swing.JButton();
        jPanel4 = new javax.swing.JPanel();
        jLabel3 = new javax.swing.JLabel();
        btnFile3 = new javax.swing.JButton();
        btnShow3 = new javax.swing.JButton();
        jPanel5 = new javax.swing.JPanel();
        jLabel4 = new javax.swing.JLabel();
        btnFile4 = new javax.swing.JButton();
        btnShow4 = new javax.swing.JButton();
        ButtonSimpan = new javax.swing.JButton();
        btnKembali = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jPanel1.setBackground(new java.awt.Color(255, 255, 255));

        jLabel1.setText("Sertifkat");

        btnFile1.setText("Choose File");
        btnFile1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                btnFile1MouseClicked(evt);
            }
        });

        btnShow1.setText("Show File");
        btnShow1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnShow1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel2Layout = new javax.swing.GroupLayout(jPanel2);
        jPanel2.setLayout(jPanel2Layout);
        jPanel2Layout.setHorizontalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel2Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1, javax.swing.GroupLayout.DEFAULT_SIZE, 189, Short.MAX_VALUE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnFile1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnShow1)
                .addContainerGap())
        );
        jPanel2Layout.setVerticalGroup(
            jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel2Layout.createSequentialGroup()
                .addContainerGap(23, Short.MAX_VALUE)
                .addGroup(jPanel2Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1)
                    .addComponent(btnFile1)
                    .addComponent(btnShow1))
                .addGap(15, 15, 15))
        );

        jPanel3.setPreferredSize(new java.awt.Dimension(303, 58));

        jLabel2.setText("Proposal");

        btnFile2.setText("Choose File");
        btnFile2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnFile2ActionPerformed(evt);
            }
        });

        btnShow2.setText("Show File");
        btnShow2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnShow2ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel3Layout = new javax.swing.GroupLayout(jPanel3);
        jPanel3.setLayout(jPanel3Layout);
        jPanel3Layout.setHorizontalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel3Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel2, javax.swing.GroupLayout.DEFAULT_SIZE, 115, Short.MAX_VALUE)
                .addGap(80, 80, 80)
                .addComponent(btnFile2)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnShow2)
                .addContainerGap())
        );
        jPanel3Layout.setVerticalGroup(
            jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanel3Layout.createSequentialGroup()
                .addContainerGap(20, Short.MAX_VALUE)
                .addGroup(jPanel3Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel2)
                    .addComponent(btnFile2)
                    .addComponent(btnShow2))
                .addGap(15, 15, 15))
        );

        jPanel4.setPreferredSize(new java.awt.Dimension(303, 58));

        jLabel3.setText("Surat Tugas");

        btnFile3.setText("Choose File");
        btnFile3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnFile3ActionPerformed(evt);
            }
        });

        btnShow3.setText("Show File");
        btnShow3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnShow3ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel4Layout = new javax.swing.GroupLayout(jPanel4);
        jPanel4.setLayout(jPanel4Layout);
        jPanel4Layout.setHorizontalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 81, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 114, Short.MAX_VALUE)
                .addComponent(btnFile3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnShow3)
                .addContainerGap())
        );
        jPanel4Layout.setVerticalGroup(
            jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel4Layout.createSequentialGroup()
                .addGap(19, 19, 19)
                .addGroup(jPanel4Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(btnFile3)
                    .addComponent(btnShow3))
                .addContainerGap(16, Short.MAX_VALUE))
        );

        jPanel5.setPreferredSize(new java.awt.Dimension(303, 58));

        jLabel4.setText("Karya");

        btnFile4.setText("Choose File");
        btnFile4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnFile4ActionPerformed(evt);
            }
        });

        btnShow4.setText("Show File");
        btnShow4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnShow4ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel5Layout = new javax.swing.GroupLayout(jPanel5);
        jPanel5.setLayout(jPanel5Layout);
        jPanel5Layout.setHorizontalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel4)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(btnFile4)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnShow4)
                .addContainerGap())
        );
        jPanel5Layout.setVerticalGroup(
            jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel5Layout.createSequentialGroup()
                .addGap(14, 14, 14)
                .addGroup(jPanel5Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(btnFile4)
                    .addComponent(btnShow4))
                .addContainerGap(21, Short.MAX_VALUE))
        );

        ButtonSimpan.setBackground(new java.awt.Color(51, 255, 51));
        ButtonSimpan.setForeground(new java.awt.Color(51, 51, 51));
        ButtonSimpan.setText("Simpan");
        ButtonSimpan.setBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED));
        ButtonSimpan.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ButtonSimpanActionPerformed(evt);
            }
        });

        btnKembali.setText("Kembali");
        btnKembali.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnKembaliActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(33, 33, 33)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addComponent(jPanel2, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 231, Short.MAX_VALUE)
                                .addComponent(btnKembali)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(ButtonSimpan, javax.swing.GroupLayout.PREFERRED_SIZE, 75, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGap(27, 27, 27))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jPanel4, javax.swing.GroupLayout.DEFAULT_SIZE, 384, Short.MAX_VALUE)
                            .addComponent(jPanel5, javax.swing.GroupLayout.DEFAULT_SIZE, 384, Short.MAX_VALUE)
                            .addComponent(jPanel3, javax.swing.GroupLayout.DEFAULT_SIZE, 384, Short.MAX_VALUE))
                        .addContainerGap(27, Short.MAX_VALUE))))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(67, 67, 67)
                .addComponent(jPanel2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jPanel3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jPanel4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jPanel5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 66, Short.MAX_VALUE)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(ButtonSimpan)
                    .addComponent(btnKembali))
                .addGap(31, 31, 31))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void ButtonSimpanActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ButtonSimpanActionPerformed
        // TODO add your handling code here:
        if (JOptionPane.showConfirmDialog(rootPane, "Anda Yakin Ingin menyimpan?") == 0) {
            //    NIM, ID_TINGKAT, JENIS_PRESTASI, NAMA_LOMBA, PERINGKAT, STATUS, tanggal_lomba, DOSEN
            Prestasi prs = new Prestasi();
            prs.setNIM(NIM);
            prs.setID_TINGKAT(ID_TINGKAT);
            prs.setJENIS_PRESTASI(JENIS_PRESTASI);
            prs.setNAMA_LOMBA(NAMA_LOMBA);
            prs.setPERINGKAT(PERINGKAT);
            prs.setSTATUS(STATUS);
            prs.setTanggal_lomba(tanggal_lomba);
            prs.setDOSEN(DOSEN);
            prs.setSertifikat(path1);
            prs.setProposal(path2);
            prs.setSurat_tugas(path3);
            prs.setKarya(path4);
            prs.setID_PRESTASI(id_prestasi);
            if (edit) {
                prs.edit();
            } else {
                prs.save();
            }
            TampilanInputPrestasi d = new TampilanInputPrestasi();
            d.show();
            dispose();
            JOptionPane.showMessageDialog(rootPane, "Data Prestasi Berhasil disimpan");
        }
    }//GEN-LAST:event_ButtonSimpanActionPerformed

    private void btnKembaliActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnKembaliActionPerformed
        Input inp = new Input();
        inp.show();
        dispose();
    }//GEN-LAST:event_btnKembaliActionPerformed

    private void btnFile1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_btnFile1MouseClicked
        path1 = fileChooser();
        if (path1 != null) {
            path1 = fileCopier(path1);
            System.out.println("Path1: " + path1);
        }
    }//GEN-LAST:event_btnFile1MouseClicked

    private void btnFile2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnFile2ActionPerformed
        path2 = fileChooser();
        if (path2 != null) {
            path2 = fileCopier(path2);
        }
    }//GEN-LAST:event_btnFile2ActionPerformed

    private void btnFile3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnFile3ActionPerformed
        path3 = fileChooser();
        if (path3 != null) {
            path3 = fileCopier(path3);
        }
    }//GEN-LAST:event_btnFile3ActionPerformed

    private void btnFile4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnFile4ActionPerformed
        path4 = fileChooser();
        if (path4 != null) {
            path4 = fileCopier(path4);
        }
    }//GEN-LAST:event_btnFile4ActionPerformed

    private void btnShow4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnShow4ActionPerformed
        tampilkanGambar(path4);
    }//GEN-LAST:event_btnShow4ActionPerformed

    private void btnShow3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnShow3ActionPerformed
        tampilkanGambar(path3);
    }//GEN-LAST:event_btnShow3ActionPerformed

    private void btnShow2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnShow2ActionPerformed
        tampilkanGambar(path2);
    }//GEN-LAST:event_btnShow2ActionPerformed

    private void btnShow1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnShow1ActionPerformed
        tampilkanGambar(path1);
    }//GEN-LAST:event_btnShow1ActionPerformed

    private String fileChooser() {
        JFileChooser chooser = new JFileChooser();

        // Menambahkan filter untuk hanya menerima gambar
        FileNameExtensionFilter filter = new FileNameExtensionFilter("Image Files", "jpg", "png", "gif", "jpeg");
        chooser.setFileFilter(filter);

        int returnValue = chooser.showOpenDialog(null);
        if (returnValue == JFileChooser.APPROVE_OPTION) {
            File selectedFile = chooser.getSelectedFile();

            // Verifikasi ekstensi file
            String filePath = selectedFile.getAbsolutePath();
            String extension = getFileExtension(filePath).toLowerCase();

            // Memastikan file yang dipilih sesuai dengan filter
            if (extension.equals("jpg") || extension.equals("png") || extension.equals("gif") || extension.equals("jpeg")) {
                return filePath;
            } else {
                JOptionPane.showMessageDialog(null, "Hanya file gambar yang diperbolehkan!", "Peringatan", JOptionPane.WARNING_MESSAGE);
                return null;  // Mengembalikan null jika file yang dipilih tidak valid
            }
        } else {
            return null;  // Kembali null jika file tidak dipilih
        }
    }

// Fungsi untuk mendapatkan ekstensi file
    private String getFileExtension(String filePath) {
        int dotIndex = filePath.lastIndexOf('.');
        if (dotIndex > 0) {
            return filePath.substring(dotIndex + 1);
        }
        return "";
    }

    void tampilkanGambar(String path) {
        ImageIcon image = new ImageIcon(path);

        int width = image.getIconWidth();
        int height = image.getIconHeight();

        // Tentukan batas maksimal untuk lebar dan tinggi gambar
        int maxWidth = 1240;
        int maxHeight = 1000;

        if (height > width) {
            while (height > maxHeight) {
                height /= 1.5;
            }
            width = (int) (height * ((double) image.getIconWidth() / image.getIconHeight()));
        } else {
            if (width > maxWidth) {
                while (width > maxWidth) {
                    width /= 1.5;
                }
                height = (int) (width * ((double) image.getIconHeight() / image.getIconWidth()));
            }
        }

        Image scaledImage = image.getImage().getScaledInstance(width, height, Image.SCALE_SMOOTH);
        ImageIcon newImage = new ImageIcon(scaledImage);

        // Menampilkan gambar dalam pop-up
        JLabel label = new JLabel(newImage);
        JScrollPane scrollPane = new JScrollPane(label);
        scrollPane.setPreferredSize(new java.awt.Dimension(900, 550));

        JOptionPane.showMessageDialog(this, scrollPane, "Gambar yang Diupload", JOptionPane.PLAIN_MESSAGE);
    }

    public String fileCopier(String path) {
        // Verifikasi apakah file yang dipilih benar ada
        Path sourcePath = Paths.get(path);
        if (Files.notExists(sourcePath)) {
            System.out.println("File tidak ditemukan: " + path);
            JOptionPane.showMessageDialog(this, "File tidak ditemukan: " + path, "Error", JOptionPane.ERROR_MESSAGE);
            return null;  // Mengembalikan null jika file tidak ada
        }

        // Tentukan folder tujuan
        Path targetDir = Paths.get("../img/uploads").toAbsolutePath();
        System.out.println("Folder target absolut: " + targetDir);

        // Cek apakah folder tujuan ada
        if (Files.notExists(targetDir)) {
            try {
                Files.createDirectories(targetDir);
                System.out.println("Folder tujuan berhasil dibuat: " + targetDir);
            } catch (IOException e) {
                System.err.println("Gagal membuat folder tujuan: " + e.getMessage());
                JOptionPane.showMessageDialog(this, "Gagal membuat folder tujuan.", "Error", JOptionPane.ERROR_MESSAGE);
                return null;
            }
        } else {
            System.out.println("Folder tujuan sudah ada: " + targetDir);
        }

        // Tentukan path target file
        String fileName = sourcePath.getFileName().toString();
        Path targetPath = targetDir.resolve(fileName);
        System.out.println("Path target absolut: " + targetPath);

        // Verifikasi apakah file sudah ada di target (jika ada, ganti)
        if (Files.exists(targetPath)) {
            System.out.println("File sudah ada di target. Mengganti file...");
        }

        // Salin file ke folder tujuan
        try {
            Files.copy(sourcePath, targetPath, StandardCopyOption.REPLACE_EXISTING);
            System.out.println("File berhasil disalin ke: " + targetPath);
            JOptionPane.showMessageDialog(this, "File berhasil disalin.", "Success", JOptionPane.INFORMATION_MESSAGE);
            return targetDir.resolve(fileName).toString();  // Mengembalikan path baru
        } catch (IOException e) {
            System.err.println("Gagal menyalin file: " + e.getMessage());
            e.printStackTrace();
            JOptionPane.showMessageDialog(this, "Gagal menyalin file: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            return null;
        }
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(InputFile.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(InputFile.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(InputFile.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(InputFile.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new InputFile().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton ButtonSimpan;
    private javax.swing.JButton btnFile1;
    private javax.swing.JButton btnFile2;
    private javax.swing.JButton btnFile3;
    private javax.swing.JButton btnFile4;
    private javax.swing.JButton btnKembali;
    private javax.swing.JButton btnShow1;
    private javax.swing.JButton btnShow2;
    private javax.swing.JButton btnShow3;
    private javax.swing.JButton btnShow4;
    private javax.swing.JFileChooser jFileChooser1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JPanel jPanel3;
    private javax.swing.JPanel jPanel4;
    private javax.swing.JPanel jPanel5;
    // End of variables declaration//GEN-END:variables
}
